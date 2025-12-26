document.addEventListener("DOMContentLoaded", () => {
    // Open the modal for adding a new category
    const addButton = document.querySelector(
        '[data-modal-toggle="crud-modal"]'
    );
    addButton.addEventListener("click", () => {
        document.getElementById("category-form").action = "/categories";
        document.getElementById("category-form").method = "POST";
        document.getElementById("category-id").value = "";
        document.getElementById("category-name").value = "";
        document.getElementById("category-submit-button").textContent =
            "Add new category";
    });

    // Open the modal for editing an existing brand
    const editButtons = document.querySelectorAll(".open-edit-modal");
    editButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const categoryId = button.getAttribute("data-category-id");
            const categoryName = button.getAttribute("data-category-name");

            document.getElementById(
                "category-form"
            ).action = `/categories/${categoryId}`;
            document.getElementById("category-form").method = "POST";
            document.getElementById("category-id").value = categoryId;
            document.getElementById("category-name").value = categoryName;
            document.getElementById("category-submit-button").textContent =
                "Update Category";

            // Add hidden _method input to mimic a PATCH request
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PATCH";
            document.getElementById("category-form").appendChild(methodInput);
        });
    });
});
