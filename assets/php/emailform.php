<html>
    <head>
        <title>VelociTech Software Solutions</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>

    <body>
        <!-- Menu -->
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				<li><a href="index.html">VelociTech Home</a></li>
				<li><a href="about.html">About VelociTech</a></li>
				<li><a href="pastprojects.html">Past VelociTech Projects</a></li>
				<li><a href="howwehelpyou.html">What VelociTech can do for you</a></li>
			</ul>
		</nav>
        <?php
            if(isset($_POST['email'])) {
 
                $email_to = "shawnm@velocitech.tech";
                $email_subject = "Web Submition";
 
                function died($error) {
                    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
                    echo "These errors appear below.<br /><br />";
                    echo $error."<br /><br />";
                    echo "Please go back and fix these errors.<br /><br />";
                    die();
                }

                if(!isset($_POST['name']) ||
                    !isset($_POST['email']) ||
                    !isset($_POST['message'])) {
                    died('We are sorry, but there appears to be a problem with the form you submitted.');       
                }

                $first_name = $_POST['name']; 
                $email_from = $_POST['email']; 
                $comments = $_POST['message']; 
 
                $error_message = "";
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
                if(!preg_match($email_exp,$email_from)) {
                    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
                }
 
                $string_exp = "/^[A-Za-z .'-]+$/";
 
                if(!preg_match($string_exp,$first_name)) {
                    $error_message .= 'The Name you entered does not appear to be valid.<br />';
                }

                if(strlen($comments) < 2) {
                    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
                }
 
                if(strlen($error_message) > 0) {
                    died($error_message);
                }
 
                $email_message = "Form details below.\n\n";
      
                function clean_string($string) {
                    $bad = array("content-type","bcc:","to:","cc:","href");
                    return str_replace($bad,"",$string);
                }
 
                $email_message .= "Name: ".clean_string($first_name)."\n";
                $email_message .= "Email: ".clean_string($email_from)."\n";
                $email_message .= "Message: ".clean_string($comments)."\n";
 
                // create email headers
                $headers = 'From: '.$email_from."\r\n".
                'Reply-To: '.$email_from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                @mail($email_to, $email_subject, $email_message, $headers);  
        ?>

        <h1>Thank you for contacting us. We will be in touch with you very soon.</h1>
 
        <?php 
            }
        ?>
    </body>
</html>