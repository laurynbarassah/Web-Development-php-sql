// ===============================
// 1. WELCOME MESSAGE
// ===============================
window.onload = function () {

    const overlay = document.getElementById("welcomeOverlay");

    if (sessionStorage.getItem("visited") !== "true") {
        overlay.style.display = "flex";
    }

};


function startWebsite() {

    let name = document.getElementById("username").value;

    if (name.trim() === "") {
        alert("Please enter your name.");
        return;
    }

    sessionStorage.setItem("visited", "true");
    sessionStorage.setItem("username", name);

    alert("Welcome " + name + "! Enjoy shopping at AMIDZI NUTS.");

    document.getElementById("welcomeOverlay").style.display = "none";
}


// ===============================
// 2. FORM VALIDATION
// ===============================

function validateForm(form) {

    let requiredFields = form.querySelectorAll("[required]");

    for (let i = 0; i < requiredFields.length; i++) {

        if (requiredFields[i].value.trim() === "") {

            alert("Please complete all required fields.");

            requiredFields[i].focus();

            return false;

        }

    }

    alert("Form submitted successfully!");

    return true;

}


// ===============================
// 3. DYNAMIC CONTENT
// ===============================

// Feature 1: Change page background colour

function changeBackground() {

    let colours = [
        "#8e3382",
        "#d8f3dc",
        "#fefae0",
        "#e3f2fd",
        "#ffe5ec"
    ];

    let randomColour = colours[Math.floor(Math.random() * colours.length)];

    document.body.style.backgroundColor = randomColour;

}


// Feature 2: Show/Hide business hours

function toggleHours() {

    let hours = document.getElementById("hours");

    if (hours.style.display === "none") {

        hours.style.display = "block";

    } else {

        hours.style.display = "none";

    }

}