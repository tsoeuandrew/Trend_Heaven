//=====================Buttons======================================
const theme = document.getElementById("theme");
const search = document.getElementById("search");

// ====================EVENT LISTENERS================================
theme.addEventListener("click", changeTheme);
search.addEventListener("click", searchProducts);

/* ==========================================================
   Checks whether the user previously selected Dark Mode.
   If Dark Mode was saved, it is automatically enabled.
========================================================== */
if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");               // Add the dark-mode class to the body
    theme.textContent = "☀️";                               // Display the sun icon because Dark Mode is active
} else {
    theme.textContent = "🌙";                                // Display the moon icon because Light Mode is active
}


// ============================THEME FUNCTIONS==============================
function changeTheme(){
    document.body.classList.toggle("dark-mode");             // Toggle the "dark-mode" class on the body.
    if (document.body.classList.contains("dark-mode")) {
        theme.textContent = "☀️";                           // Change the button icon to a sun
        localStorage.setItem("theme", "dark");              // Save the selected theme.
    } 
    else {
        theme.textContent = "🌙";                           // Change the button icon to a moon.
        localStorage.setItem("theme", "light");             // Save the selected theme.
    }
}

//============================SEARCH FUNCTIONS===============================
function searchProducts(){
     const searchText =
        document.getElementById("searchInput").value;
    console.log(searchText);
}

//============================CART FUNCTIONS==============================
function openCart(){

}

//============================LOGIN FUNCTIONS==============================
function loginUser(){

}



/* ==========================================================
   END OF FILE
========================================================== */