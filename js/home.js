// home.js

function subscribe() {
    const emailInput = document.querySelector('input[name="email"]');
    const email = emailInput.value;

    if (validateEmail(email)) {
        // Simulate a successful subscription
        alert(`Thank you for subscribing with ${email}!`);
        emailInput.value = ''; // Clear the input field
    } else {
        alert('Please enter a valid email address.');
    }
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
