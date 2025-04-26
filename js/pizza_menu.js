// pizza_menu.js

document.addEventListener('DOMContentLoaded', function() {
    const addButtons = document.querySelectorAll('.menu-card button');

    addButtons.forEach(button => {
        button.addEventListener('click', function() {
            const menuCard = this.closest('.menu-card');
            const pizzaName = menuCard.querySelector('h3').innerText;
            const crust = menuCard.querySelector('select:nth-of-type(1)').value;
            const size = menuCard.querySelector('select:nth-of-type(2)').value;

            // Simulate adding to cart
            alert(`Added to cart: ${pizzaName}\nCrust: ${crust}\nSize: ${size}`);
        });
    });
});