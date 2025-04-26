// contact_us.js

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Gather form data
        const formData = new FormData(form);

        // Send the data to the PHP script
        fetch('contact_us.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Thank you for your feedback!");
                form.reset(); // Reset the form
            } else {
                alert("There was an error submitting your feedback. Please try again.");
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

