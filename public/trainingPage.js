// trainingPage.js
// This script controls training section visibility based on user tier

document.addEventListener('DOMContentLoaded', function() {
    // Assume user info is stored in localStorage after login
    let user = null;
    try {
        user = JSON.parse(localStorage.getItem('user'));
    } catch (e) {}

    // Hide both sections by default
    const techniqueSection = document.querySelectorAll('.section')[0];
    const physicalSection = document.querySelectorAll('.section')[1];
    if (!user || !user.tier) {
        // If not logged in, show only technique
        if (physicalSection) physicalSection.style.display = 'none';
        return;
    }
    const tier = user.tier.toLowerCase();
    if (tier === 'plus') {
        if (physicalSection) physicalSection.style.display = 'none';
    } else if (tier === 'gold' || tier === 'platinum') {
        // Show both
        if (techniqueSection) techniqueSection.style.display = '';
        if (physicalSection) physicalSection.style.display = '';
    } else {
        // For normal or unknown, show only technique
        if (physicalSection) physicalSection.style.display = 'none';
    }
});
