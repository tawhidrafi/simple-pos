document.addEventListener("DOMContentLoaded", () => {
    // Open the modal for adding a new brand
    const addButton = document.querySelector(
        '[data-modal-toggle="crud-modal"]'
    );
    addButton.addEventListener("click", () => {
        document.getElementById("brand-form").action = "/brands";
        document.getElementById("brand-form").method = "POST";
        document.getElementById("brand-id").value = "";
        document.getElementById("brand-name").value = "";
        document.getElementById("brand-submit-button").textContent =
            "Add new brand";
    });

    // Open the modal for editing an existing brand
    const editButtons = document.querySelectorAll(".open-edit-modal");
    editButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const brandId = button.getAttribute("data-brand-id");
            const brandName = button.getAttribute("data-brand-name");

            document.getElementById("brand-form").action = `/brands/${brandId}`;
            document.getElementById("brand-form").method = "POST";
            document.getElementById("brand-id").value = brandId;
            document.getElementById("brand-name").value = brandName;
            document.getElementById("brand-submit-button").textContent =
                "Update brand";

            // Add hidden _method input to mimic a PATCH request
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PATCH";
            document.getElementById("brand-form").appendChild(methodInput);
        });
    });
});
