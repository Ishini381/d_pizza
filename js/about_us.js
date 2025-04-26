// about_us.js

// Function to display an alert when the page loads
window.onload = function() {
    alert("Welcome to Diamond Foods! Learn more about us.");
};

// You can add more interactive functions here as needed
function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('active');
}

// Fetch company information from the PHP file
fetch('about_us.php')
    .then(response => response.json())
    .then(data => {
        console.log(data); // Handle the data as needed
    })
    .catch(error => console.error('Error fetching company info:', error));