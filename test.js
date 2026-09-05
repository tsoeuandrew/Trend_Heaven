console.log("Hello, World!");
alert("This is a test alert!");
// Find the button using its ID and store it in a variable
const button = document.getElementById("btnHello");

// Add a click event to the button
button.addEventListener("click", function () {

    // This code runs every time the button is clicked
    alert("Hello, World!");

});