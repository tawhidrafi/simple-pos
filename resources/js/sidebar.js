// toggle the sidebar
document.getElementById("open-sidebar").addEventListener("click", function () {
    document.getElementById("sidebar").classList.remove("-translate-x-full");
});

document.getElementById("close-sidebar").addEventListener("click", function () {
    document.getElementById("sidebar").classList.add("-translate-x-full");
});

// Close sidebar if clicked outside
document.addEventListener("click", function (event) {
    const sidebar = document.getElementById("sidebar");
    const openButton = document.getElementById("open-sidebar");
    if (!sidebar.contains(event.target) && !openButton.contains(event.target)) {
        sidebar.classList.add("-translate-x-full");
    }
});

// dropdown menu toggle
const dropdownButtons = document.querySelectorAll('[id$="-dropdown"]');

dropdownButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const menuId = button.id.replace("-dropdown", "-menu");
        const menu = document.getElementById(menuId);
        const isVisible = !menu.classList.contains("hidden");

        // Close all menus
        dropdownButtons.forEach((b) => {
            const closeMenuId = b.id.replace("-dropdown", "-menu");
            const closeMenu = document.getElementById(closeMenuId);
            closeMenu.classList.add("hidden");
        });

        // Open the clicked menu if it was not visible
        if (!isVisible) {
            menu.classList.remove("hidden");
        }
    });
});
