// checkout.js

document.addEventListener("DOMContentLoaded", function() {
    const proceedButton = document.querySelector('.proceed-btn');

    proceedButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Gather form data
        const firstName = document.getElementById('first-name').value;
        const lastName = document.getElementById('last-name').value;
        const contact = document.getElementById('contact').value;
        const email = document.getElementById('email').value;
        const country = document.getElementById('country').value;
        const city = document.getElementById('city').value;
        const address = document.getElementById('address').value;
        const postalCode = document.getElementById('postal-code').value;

        // Basic validation
        if (!firstName || !lastName || !contact || !email || !country || !city || !address || !postalCode) {
            alert("Please fill in all fields.");
            return;
        }

        // Create a FormData object
        const formData = new FormData();
        formData.append('firstName', firstName);
        formData.append('lastName', lastName);
        formData.append('contact', contact);
        formData.append('email', email);
        formData.append('country', country);
        formData.append('city', city);
        formData.append('address', address);
        formData.append('postalCode', postalCode);

        // Send the data to the PHP script
        fetch('checkout.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Checkout successful! Thank you for your order.");
                // Optionally redirect to a confirmation page
                // window.location.href = 'confirmation.html';
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});