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
        include ('assets/php/db_connect.php');

        $employees = array();
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $sql = "SELECT * FROM employee;" ;
        $valid = 'not valid';

        
       $sql1 = "SELECT * FROM projectList;";
        
        $result1 = mysqli_query ($conn, $sql1);
        $result = mysqli_query ($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {

	        while($row = mysqli_fetch_assoc($result)) {

		        $empName = $row["employeename"];
		        $empPass = $row["employeepass"];

		        if ($user === $empName && $pass === $empPass) {
            
                    loginSucceed();

                }else loginFail();
            }
        }

       function loginSucceed(){

            global $conn;
            $projectDetails = array();
            $sql = "SELECT * FROM projectList;";
            $result = mysqli_query ($conn, $sql);
            
            createProjectPanel($projectDetails);
            createButtonForNewProject();
            
            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
            
                    $projectDetails = ['projectId' => $row["idProject"],
                    'name' => $row["projectName"],
                    'header' => $row["projectShortDescription"],
                    'link' => $row["projectLink"],
                    'picture' => $row["projectPicture"],
                    'decription' => $row["projectFullDescription"],
                    'isCurrent' => $row["projectIsCurrent"],
                    'isArchive' => $row["projectArchive"]];
                    
                    createProjectPanel($projectDetails);
                    createButtonForExistingProject();
                } 
            }
        }
        function createButtonForNewProject(){
            
            echo '<button type="submit" name="create">Add Project</button>';
            echo '<br /></div></div></form>';
        }
        
        function createButtonForExistingProject(){
            
            echo '<button type="submit" name="update">Update</button>';
            echo '<button type="submit" name="delete">Delete</button>';
            echo '<br /></div></div></form>';
        }

        function createProjectPanel($projectDetails){
            
            echo '<form method="post" action="assets/php/submitForm.php">';
            echo '<div class="container">';
            echo '<div class="list-box ">';
            echo '<div class="box-header">';
            
            if ($projectDetails['name']){
                echo '<h2>',$projectDetails['name'],'</h2>';
            }else echo '<h2>New Project</h2>';
            
            echo '</div>';           
            echo '<label for="current">Current</label>';
            echo '<input class="checkbox-adjust" type="checkbox" name="current" id="current">';
            echo '<label for="archive">Archive</label>';
            echo '<input class="checkbox-adjust" type="checkbox" name="archive" id="archive"><br />';         
            echo '<label for="name">Project Name </label><br />';
            echo '<input type="text" name="name" id="name" value="',$projectDetails['name'],'"><br />';           
            echo '<label for="header">Header </label><br />';
            echo '<input type="text" name="header" id="header" value="',$projectDetails['header'],'"><br />';           
            echo '<label for="link">Project Link </label><br />';
            echo '<input type="text" name="link" id="link" value="',$projectDetails['link'],'"><br />';          
            echo '<label for="picture">Picture Link</label><br />';
            echo '<input type="text" name="picture" id="picture" value="',$projectDetails['picture'],'"><br />';            
            echo '<label class="description" for="description" >Description</label><br />';
            echo '<textarea name="description" id="description">',$projectDetails['decription'],'</textarea><br />';
            
        }

        function loginFail(){
            echo '<form action = "login.php">';
            echo '<div class="container">';
            echo '<div class="top">';
            echo '<h1 id="title" class="hidden">';
            echo '<span id="logo">Authentication Error';
            echo '<span>';
            echo '</span>';
            echo '</span>';
            echo '</h1>';
            echo '</div>';
            echo '<div class="login-box animated fadeInUp">';
            echo '<div class="box-header">';
            echo '<h2>Fail</h2>';
            echo '</div>';
            echo '<input type="submit" value="Return To Login"/>';
            echo '<br />';
            echo '</div>';
            echo '</div>';
            echo '</form>';
        }
        function logout(){
            mysqli_close($conn);
        }
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