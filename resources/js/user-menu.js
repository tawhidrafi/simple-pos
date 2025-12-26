// JavaScript to toggle the dropdown menu with transition
document
    .getElementById("user-menu-button")
    .addEventListener("click", function () {
        const menu = document.getElementById("user-menu");
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            setTimeout(() => {
                menu.classList.remove("opacity-0", "transform", "scale-95");
            }, 10);
        } else {
            menu.classList.add("opacity-0", "transform", "scale-95");
            menu.addEventListener(
                "transitionend",
                () => {
                    if (menu.classList.contains("opacity-0")) {
                        menu.classList.add("hidden");
                    }
                },
                {
                    once: true,
                }
            );
        }
    });

// Optional: Close the menu if clicked outside
document.addEventListener("click", function (event) {
    const menu = document.getElementById("user-menu");
    const button = document.getElementById("user-menu-button");
    if (!button.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.add("opacity-0", "transform", "scale-95");
        menu.addEventListener(
            "transitionend",
            () => {
                if (menu.classList.contains("opacity-0")) {
                    menu.classList.add("hidden");
                }
            },
            {
                once: true,
            }
        );
    }
});
