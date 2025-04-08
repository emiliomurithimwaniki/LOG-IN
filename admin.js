// Handle sidebar toggle functionality with animation
const toggleBtn = document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('main-content');

// Initially set the sidebar left position to -250px to hide it
sidebar.style.left = '-250px';

// Toggle the sidebar visibility on button click
toggleBtn.addEventListener('click', function() {
    if (sidebar.style.left === '-250px') {
        // Sidebar is hidden, slide it in
        sidebar.style.animation = 'slideIn 0.3s ease forwards';
        sidebar.style.left = '0';  // Move sidebar to the visible position
        mainContent.style.marginLeft = '250px'; // Push the main content to the right
        toggleBtn.textContent = '☰ Close Sidebar';  // Change button text to "Close Sidebar"
    } else {
        // Sidebar is visible, slide it out
        sidebar.style.animation = 'slideOut 0.3s ease forwards';
        sidebar.style.left = '-250px';  // Move sidebar off-screen
        mainContent.style.marginLeft = '0'; // Reset the main content position
        toggleBtn.textContent = '☰ Open Sidebar';  // Change button text back to "Open Sidebar"
    }
});
