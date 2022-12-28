<div>
    Checkout Form
</div>
<br>
<div>
  <h1><strong>Your Information</strong></h1>
<form action="/checkout" method="post">

  <input class="mt-2" type="text" id="name" name="name" placeholder="First Name" required>
  <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
  <input type="email" id="email" name="email" placeholder="Email" required>
  <hr class="my-4 border-1">
  <h1><strong>Shipping Information</strong></h1>
  <input class="mt-2" type="text" id="address" name="address" placeholder="Address" required><br>
  <input class="mt-2" type="text" id="number" name="number" placeholder="Number" required><br>
  <input class="mt-2" type="text" id="zipcode" name="zipcode" placeholder="Zipcode" required><br>
  <input class="mt-2" type="text" id="city" name="city" placeholder="City" required><br>
  <input class="mt-2" type="tel" id="phone" name="phone" placeholder="Phonenumber" required>
  <hr class="my-4">
  <label for="payment"><strong>Payment Method:</strong></label><br>
  <select id="payment" name="payment" required>
    <option value="creditcard">Credit Card</option>
    <option value="debitcard">Debit Card</option>
    <option value="paypal">PayPal</option>
    <option value="applepay">Apple Pay</option>
  </select><br><br>
  <hr class="my-4">
  <button type="submit" class="px-6 py-2 text-sm font-bold rounded shadow bg-lime-500">Next</button>
</form> 
</div>