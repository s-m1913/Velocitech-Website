<html>
    <head>
        <title>VelociTech Software Solutions</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="login/css/style.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body>
        <?php
        include 'db_connect.php';

        $employees = array();
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $sql = "SELECT * FROM employee WHERE 'employeename' = ".$user." AND 'employeepass = '".$pass.";" ;
        $valid = 'not valid';

        $result = mysqli_query ($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

	        while($row = mysqli_fetch_assoc($result)) {

		        $empName = $row["employeename"];
		        $empPass = $row["employeepass"];

		        if ($user === $empName && $pass === $empPass) {
                    //query
                    //display results
                    echo '<h1>Success</h1>';
                }                
	        }

        }else{//display login fail
            echo '<h1>Authentication Failed</h1>';
            echo '<form action = "login.php">';
            echo '<input type="submit" value="Return To Login"/>';
            echo '</form>';
        }

        mysqli_close($conn);
        ?>
        <!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
    </body>
</html>