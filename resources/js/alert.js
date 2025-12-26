// show alert popup
const alertPopup = document.getElementById("alert-popup");
alertPopup.classList.remove("hide-alert");
alertPopup.classList.add("show-alert");

// Automatically hide the popup after 3 seconds
setTimeout(() => {
    hideAlert();
}, 3000);

// hide alert popup
function hideAlert() {
    alertPopup.classList.remove("show-alert");
    alertPopup.classList.add("hide-alert");
}

// Close button
document.getElementById("close-alert").addEventListener("click", hideAlert);
