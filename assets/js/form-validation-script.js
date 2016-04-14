var Script = function () {

    //$.validator.setDefaults({
    //    submitHandler: function() { alert("submitted!"); }
    //});

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        // validate signup form on keyup and submit
        $("#user_form").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3
                },
                old_password: {
                    required: true,
                    minlength: 6
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                agree: "required"
            },
            messages: {
                username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 3 characters long."
                },
                old_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 6 characters long."
                },
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 6 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 6 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                agree: "Please accept our terms & condition."
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();