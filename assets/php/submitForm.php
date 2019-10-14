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
        <?php
            include 'db_connect.php';

            $response = array();
            $button = $_POST["button"];
            $current = $_POST["current"];
            $archive = $_POST["archive"];
            $name = $_POST["name"];
            $header = $_POST["header"];
            $link = $_POST["link"];
            $pic = $_POST["picture"];
            $description = $_POST["description"];
            $sql = '';

            if($button==='create'){
                $sql = "INSERT INTO `projectList` (`projectName`, `projectIsCurrent`, `projectArchive`, `projectLink`, `projectShortDescription`, `projectFullDescription`, `projectPicture`) VALUES ('".$name."', '".$current."', '".$archive."', '".$link."', '".$header."', '".$description."', '".$pic."'); ";

            }else if($button==='update'){
                $sql = "UPDATE `projectList` SET `projectName`='".$name."',`projectIsCurrent`='".$current."',`projectArchive`='".$archive."',`projectLink`='".$link."',`projectShortDescription`='".$header."',`projectFullDescription`='".$description."',`projectPicture`='".$pic."' WHERE `projectName`='".$name."';";

            }else if($button==='delete'){
                $sql = "DELETE FROM `projectList` WHERE `projectName` = ".$name.";";

            }

            if (mysqli_query ($conn, $sql)) {
                $response["success"] = 1;
                $msg = "Success";
	
            }else{
	            //Some error while fetching data
	            $response["success"] = 0;
	            $response["message"] = mysqli_error($con);
	            $msg = "Fail";
            }
            echo'<div class="container">';
            echo'<div class="top">';
            echo'<h1 id="title" class="hidden">';
            echo'<span></span></span></h1></div>';
            echo'<div class="login-box animated fadeInUp">';
            echo'<div class="box-header">';
            echo'<h2>'.$msg.'</h2></div>';         
            echo'</div></div></form>';
            mysqli_close($conn);
            
        ?>
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