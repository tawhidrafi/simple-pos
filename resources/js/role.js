document.addEventListener("DOMContentLoaded", () => {
    // Open the modal
    const openButtons = document.querySelectorAll(".open-role-modal");
    openButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const userId = button.getAttribute("data-user-id");

            const form = document.querySelector("#role-form");
            form.action = `/role/${userId}`;

            // Add hidden _method input to mimic a PATCH request
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PATCH";
            document.getElementById("role-form").appendChild(methodInput);
        });
    });
});
