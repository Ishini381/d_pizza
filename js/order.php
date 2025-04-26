<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Checkout Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/order.css">
    <script src="js/order.js"></script>
</head>

    <div class="container">
        <div class="form-section information-section">
            <h2>Delivery Information</h2>
            <label for="first-name">First Name</label>
            <input id="first-name" placeholder="First Name" type="text"/>

            <label for="contact">Contact</label>
            <input id="contact" placeholder="Your Contact" type="text"/>

            <label for="last-name">Last Name</label>
            <input id="last-name" placeholder="Last Name" type="text"/>

            <label for="email">Email</label>
            <input id="email" placeholder="Your Email" type="email"/>

            <label for="payment-method">Payment Method</label>
            <div class="payment-method">Payment Method</div>   
    </div>
    <div class="form-section checkout-section">
        <h2>CHECKOUT</h2>
        <label for="country">Country</label>
        <input id="country" placeholder="Your Country" type="text"/>

        <label for="city">City</label>
        <input id="city" placeholder="Your City" type="text"/>

        <label for="address">Address</label>
        <input id="address" placeholder="Your Address" type="text"/>

        <label for="postal-code">Postal Code</label>
        <input id="postal-code" placeholder="Postal code" type="text"/>
        
        <div class="price">Price: Rs.2500/=</div>
        <button class="proceed-btn">PROCEED</button>
   </div>
</body>
</html>
