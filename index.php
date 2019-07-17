<html>

<head>
    <?php include 'header.php';?>
</head>

<body class="bg-white">
    <section class="container">
        <div class="row">
            <div class="col-sm-4 col-md-offset-4 login-wrapper">
                <form onsubmit="return submitForm(this)" method="POST" class="login">
                    <h1>Login</h1>
                    <input type="text" name="EMPLOYEEID" class="emp-id" placeholder="EMPLOYEE ID" />
                    <input type="password" name="PASSWORD" class="password" placeholder="PASSWORD" />
                    <input type="hidden" name="form_submitted" value=1>
                    <input type="submit" value="Login" class="button">
                    <p>Problem logging in? <a href="reset.html">Reset Password</a></p>
                </form>
            </div>
        </div>
    </section>
    <script type='text/javascript'>
        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (value * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }
        $(document).ready(function() {

        });

        function submitForm(form, anchor) {
            // console.log(form);return false;
            var formData = $(form).serializeArray();
            console.log(formData);
            $.ajax({
                url: "login.php",
                type: 'post',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if (data == "error") {
                        //alert("Invalid user");

                        setCookie('user', JSON.stringify(formData));
                        console.log(getCookie('user'));
                        window.location.href = "/mock/manageleave.php";

                    }
                    if ($.trim(data) == 'success') {
                        setCookie('user', JSON.stringify(formData));
                        console.log(getCookie('user'));
                        window.location.href = "/mock/manageleave.php";
                        // $(anchor).parent().parent().find('td:eq(5)').text('Rejected');
                    }
                },
                error: function(data) {
                    console.log(data);

                }
            });
            return false;
        }
    </script>
</body>

</html>