<html>
<head>
    <meta charset="utf-8">
    <title>Admin Portal</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="login/css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="login/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
    <form method="post" action="validateLogin.php">
    <div class="container">
        <div class="top">
            <h1 id="title" class="hidden">
            <span id="logo">Welcome
                <span>
                </span>
            </span>
            </h1>
        </div>
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2>Log In</h2>
            </div>
            <label for="username">Username</label>
            <br />
            <input type="text" name="user" id="user">
            <br />
            <label for="password">Password</label>
            <br />
            <input type="password" name="pass" id="pass">
            <br />
            <button type="submit">Sign In</button>
            <br />

        </div>
    </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#logo').addClass('animated fadeInDown');
            $("input:text:visible:first").focus();
        });
        $('#username').focus(function () {
            $('label[for="username"]').addClass('selected');
        });
        $('#username').blur(function () {
            $('label[for="username"]').removeClass('selected');
        });
        $('#password').focus(function () {
            $('label[for="password"]').addClass('selected');
        });
        $('#password').blur(function () {
            $('label[for="password"]').removeClass('selected');
        });
    </script>
</body>
</html>