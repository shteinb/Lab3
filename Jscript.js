// This function will be called when the form is submitted
function handleSubmit(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Get the form element
    const form = document.getElementById('form-container');
	
    // Get the value of the "Name" field
    const nameInput = document.getElementById('name');
    const name = nameInput.value;
	
    // Display an alert with the entered name
    alert(`Thank you, ${name}! Your order has been placed.`);

    // Reset the form to its default values
    form.reset();
}

// Add an event listener to the form submit button
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-container');
    form.addEventListener('submit', handleSubmit);
});

        // Let's add a simple function to display an alert when the form is submitted.
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