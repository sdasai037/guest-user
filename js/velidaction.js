$(document).ready(function () {
    //Function to validate a field
    function validateField(input) {
        let field = $(input);
        let value = field.val().trim();
        let errorSpan = $("#" + field.attr("name") + "Error");
        let fieldType = field.data("validation") || ""; // Get validation type
        let minLength = field.data("min") || 0;
        let mexLength = field.data("mex") || 9999;

        let errorMessage = "";

        //Requreid field validation
        if (fieldType.includes("required") && value === "") {
            errorMessage = "This field is requred.";
        }
        // Email validation
        else if (fieldType.includes("email") && !/^\S+@\S+\.\S+$/.test(value)) {
            errorMessage = "Enter a velid email";
        }
        // Strong password valdation
        else if (fieldType.includes("strongPassword") && !/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.(_[^\w])).{8,}$/.test(value)) {
            errorMessage = "password must be at least 8 characters, including uppercase and lowercase letters, numbers, and a spicl character.";
        }
        // Confirm password validation
        else if (fieldType.includes("confirmPassword")) {
            let confirmPassword = field.val().trim();
            let password = $("#" + field.data('password-id')).val().trim();
            if (confirmPassword !== password) {
                errorMessage = "password do not match.";
            }
        }
        // Terms and Conditions validation
        else if (fieldType.includes("terms") && !field.is(":checked")) {
            errorMessage = "You must agree to the Terms & Condition.";
        }
        // Alphbeticl validation
        else if (fieldType.includes("alpha") && !/^[A-Za-z\s]+$/.test(value)) {
            errorMessage = "only letters are allowed.";
        }

        // Terms and Conditions validation
        else if (fieldType.includes("numeric") && !/^\d+$/.test(value)) {
            errorMessage = "only numbers are allowed.";
        }
        // Min length validation
        else if (fieldType.includes("min") && value.length < minLength) {
            errorMessage = 'Must be at least ${minLength} characters.';
        }
        // max length validation
        else if (fieldType.includes("max") && value.length < maxLength) {
            errorMessage = 'Must be at least than ${maxLength} characters.';
        }
        // dile upload validation
        else if (fieldType.includes("file") && !/\.(jpg|jpeg|png)$/i.test(value)) {
            errorMessage = "Only JPG, JPEG, or PNG files are allowed.";
        }
        else if (fieldType.includes("file") && field[0].files[0].size > 200000) {
            errorMessage = "file size must be less then 20KB.";
        }

        // Show or clear error message
        if (errorMessage) {
            errorSpan.text(errorMessage).show();
            field.addClass("is-invalid");
            field.removeClass("is-valid"); // add red border
        } else {
            errorSpan.text("").hide();
            field.addClass("is-valid");
            field.removeClass("is-invalid"); // remove red border
        }
        $("form").on("subimt", function (e) {
            let isVailid = true;

            //Attach validation event to all inputs with 'ontput'
            $(this).find("input, textarea").each(function () {
                validateField(this);
            });

            //validate form on submit
            $("from").on("submirt", function (e) {
                let isVailid = true;

                $(this).find("input, textarea").each(function () {
                    validateField(this);
                    if ($(this).next("error").text() !== "") {
                        isVailid = false;
                    }
                });

                if (!isVailid) {
                    e.preventDefault(); // prevent submission if validation fails
                }
            })
        })
    }
})
