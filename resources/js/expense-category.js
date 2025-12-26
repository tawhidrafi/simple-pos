document.addEventListener("DOMContentLoaded", () => {
    // Open the modal for adding a new expenseCategory
    const addButton = document.querySelector(
        '[data-modal-toggle="crud-modal"]'
    );
    addButton.addEventListener("click", () => {
        document.getElementById("expenseCategory-form").action =
            "/accounting/expense-categories/";
        document.getElementById("expenseCategory-form").method = "POST";
        document.getElementById("expenseCategory-id").value = "";
        document.getElementById("expenseCategory-name").value = "";
        document.getElementById("expenseCategory-submit-button").textContent =
            "Add new category";
    });

    // Open the modal for editing an existing expense Category
    const editButtons = document.querySelectorAll(".open-edit-modal");
    editButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const expenseCategoryId = button.getAttribute(
                "data-expenseCategory-id"
            );
            const expenseCategoryName = button.getAttribute(
                "data-expenseCategory-name"
            );

            document.getElementById(
                "expenseCategory-form"
            ).action = `/accounting/expense-categories/${expenseCategoryId}`;
            document.getElementById("expenseCategory-form").method = "POST";
            document.getElementById("expenseCategory-id").value =
                expenseCategoryId;
            document.getElementById("expenseCategory-name").value =
                expenseCategoryName;
            document.getElementById(
                "expenseCategory-submit-button"
            ).textContent = "Update category";

            // Add hidden _method input to mimic a PATCH request
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PATCH";
            document
                .getElementById("expenseCategory-form")
                .appendChild(methodInput);
        });
    });
});
