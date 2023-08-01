// JavaScript code for lab2.html

// Get the form element
const form = document.getElementById('form-container');

// Add a submit event listener to the form
form.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Get the value of the "Name" field
    const nameInput = document.getElementById('name');
    const name = nameInput.value;

    // Display an alert with the entered name
    alert(`Thank you, ${name}! Your order has been placed.`);
});