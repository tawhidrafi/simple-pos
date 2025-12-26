document.addEventListener("DOMContentLoaded", () => {
    // Open the modal for adding a new unit
    const addButton = document.querySelector(
        '[data-modal-toggle="crud-modal"]'
    );
    addButton.addEventListener("click", () => {
        document.getElementById("unit-form").action = "/units";
        document.getElementById("unit-form").method = "POST";
        document.getElementById("unit-id").value = "";
        document.getElementById("unit-name").value = "";
        document.getElementById("unit-submit-button").textContent =
            "Add new unit";
    });

    // Open the modal for editing an existing unit
    const editButtons = document.querySelectorAll(".open-edit-modal");
    editButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const unitId = button.getAttribute("data-unit-id");
            const unitName = button.getAttribute("data-unit-name");

            document.getElementById("unit-form").action = `/units/${unitId}`;
            document.getElementById("unit-form").method = "POST";
            document.getElementById("unit-id").value = unitId;
            document.getElementById("unit-name").value = unitName;
            document.getElementById("unit-submit-button").textContent =
                "Update unit";

            // Add hidden _method input to mimic a PATCH request
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PATCH";
            document.getElementById("unit-form").appendChild(methodInput);
        });
    });
});
