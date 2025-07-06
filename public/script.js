// script.js

window.addEventListener('DOMContentLoaded', () => {
  fetchUsers();
});

document.getElementById('searchName').addEventListener('input', fetchUsers);
document.getElementById('filterPayment').addEventListener('change', fetchUsers);

document.getElementById('saveEdit').addEventListener('click', () => {
  const id = document.getElementById('editUserId').value;
  const tier = document.getElementById('editTier').value;

  fetch('/api/update-tier', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id, tier })
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
        fetchUsers();
      }
    });
});

function fetchUsers() {
  console.log('Fetching users...');
  fetch('/api/get-users')
    .then(res => {
      console.log('Response status:', res.status);
      if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
      }
      return res.json();
    })
    .then(data => {
      console.log('Received data:', data);
      const keyword = document.getElementById('searchName').value.toLowerCase();
      const filter = document.getElementById('filterPayment').value;
      const table = document.getElementById('userTable');
      table.innerHTML = '';
      // Sort users by tier before displaying
      const tierOrder = ['Platinum', 'Gold', 'Plus', 'Rookie'];
      data = data.sort((a, b) => {
        const aIdx = tierOrder.indexOf(a.tier);
        const bIdx = tierOrder.indexOf(b.tier);
        // If not found, put at end
        return (aIdx === -1 ? 99 : aIdx) - (bIdx === -1 ? 99 : bIdx);
      });
      data
        .filter(u => u.name.toLowerCase().includes(keyword) && (!filter || u.payment === filter))
        .forEach(user => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.tier}</td>
            <td>
              <select class="payment-select" data-id="${user.id}" data-original="${user.payment}">
                <option value="paid" ${user.payment === 'paid' ? 'selected' : ''}>Paid</option>
                <option value="unpaid" ${user.payment === 'unpaid' ? 'selected' : ''}>Unpaid</option>
              </select>
            </td>
            <td>${user.expiry || '-'}</td>
            <td>${user.countdown}</td>
            <td><button class="btn btn-warning btn-sm editBtn" data-id="${user.id}" data-tier="${user.tier_ID}">Edit Tier</button></td>
          `;
          table.appendChild(tr);
        });
      document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
          document.getElementById('editUserId').value = this.getAttribute('data-id');
          document.getElementById('editTier').value = this.getAttribute('data-tier');
          new bootstrap.Modal(document.getElementById('editModal')).show();
        });
      });
      document.querySelectorAll('.payment-select').forEach(select => {
        select.addEventListener('change', function() {
          this.parentElement.parentElement.classList.add('edited');
        });
      });
    })
    .catch(error => {
      console.error('Error fetching users:', error);
      const table = document.getElementById('userTable');
      table.innerHTML = '<tr><td colspan="7" class="text-center text-danger">Error loading users: ' + error.message + '</td></tr>';
    });
}

document.getElementById('saveAllBtn').addEventListener('click', () => {
  const updates = [];
  document.querySelectorAll('.payment-select').forEach(select => {
    const id = select.getAttribute('data-id');
    const original = select.getAttribute('data-original');
    const current = select.value;
    if (original !== current) {
      updates.push({ id, status: current });
    }
  });
  if (updates.length === 0) {
    alert('No changes to save.');
    return;
  }
  fetch('/api/update-status-bulk', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ updates })
  })
    .then(res => res.json())
    .then(results => {
      if (results.success) {
        alert('Changes saved successfully!');
      } else {
        alert('Some changes failed to save.');
      }
      fetchUsers();
    });
});
