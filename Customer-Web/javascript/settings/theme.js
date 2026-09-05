// Find the theme button
const theme = document.getElementById("theme");

// Add a click event to the button
theme.addEventListener("click", changeTheme);

// Function to change the theme
function changeTheme() {

    // Switch between light mode and dark mode
    document.body.classList.toggle("dark-mode");

    // Change the button text
    if (document.body.classList.contains("dark-mode")) {
        theme.textContent = "☀️ Light Mode";
    } else {
        theme.textContent = "🌙 Dark Mode";
    }

}