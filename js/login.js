function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username && password) {
        // Here you can implement the actual login logic, e.g., sending the data to the server
        alert(`Logging in with Username: ${username}`);
        // You can use fetch or XMLHttpRequest to send data to a PHP script
    } else {
        alert('Please enter both username and password.');
    }
}

// Function to handle guest login
function continueAsGuest() {
    alert('Continuing as guest...');
    // Redirect to the order page or main page
    window.location.href = 'home.html'; // Change to your desired page
}

// Function to handle account creation
function createAccount() {
    alert('Redirecting to account creation page...');
    // Redirect to the account creation page
    window.location.href = 'create_account.html'; // Change to your desired page
}

// Event listeners for buttons
document.querySelector('.diamond').addEventListener('click', login);
document.querySelector('.guest').addEventListener('click', continueAsGuest);
document.querySelector('.account').addEventListener('click', createAccount);


// login.js

/*document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Basic validation
        if (username === '' || password === '') {
            alert('Please fill in all fields.');
            return;
        }

        // Simulate a POST request to the server
        const formData = new FormData();
        formData.append('username', username);
        formData.append('password', password);

        fetch('login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show the response from the server
            // Optionally, redirect or perform other actions based on the response
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error logging in. Please try again later.');
        });
    });
});