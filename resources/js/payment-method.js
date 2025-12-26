document.addEventListener("DOMContentLoaded", () => {
    // Open the modal for adding a new paymentMethod
    const addButton = document.querySelector(
        '[data-modal-toggle="crud-modal"]'
    );
    addButton.addEventListener("click", () => {
        document.getElementById("paymentMethod-form").action =
            "/accounting/payment-methods/";
        document.getElementById("paymentMethod-form").method = "POST";
        document.getElementById("paymentMethod-id").value = "";
        document.getElementById("paymentMethod-name").value = "";
        document.getElementById("paymentMethod-submit-button").textContent =
            "Add new method";
    });

    // Open the modal for editing an existing method
    const editButtons = document.querySelectorAll(".open-edit-modal");
    editButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const paymentMethodId = button.getAttribute(
                "data-paymentMethod-id"
            );
            const paymentMethodName = button.getAttribute(
                "data-paymentMethod-name"
            );

            document.getElementById(
                "paymentMethod-form"
            ).action = `/accounting/payment-methods/${paymentMethodId}`;
            document.getElementById("paymentMethod-form").method = "POST";
            document.getElementById("paymentMethod-id").value = paymentMethodId;
            document.getElementById("paymentMethod-name").value =
                paymentMethodName;
            document.getElementById("paymentMethod-submit-button").textContent =
                "Update method";

            // Add hidden _method input to mimic a PATCH request
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PATCH";
            document
                .getElementById("paymentMethod-form")
                .appendChild(methodInput);
        });
    });
});
