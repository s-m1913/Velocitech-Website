<html>
    <head>
        <title>VelociTech Software Solutions</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">
        
		<!-- Wrapper -->
		<div id="wrapper">
		    
            <!-- Header -->
	        <header id="header">
		        <div class="inner">

			        <!-- Logo -->
                    <a href="index.html" class="logo">
                          <h1>VelociTech Software Solutions<br />
                          bringing your ideas to the world at <em> High Velocity. </em></h1>
                     </a>

					<!-- Nav -->
					<nav>
						<ul>
							<li><a href="#menu">Menu</a></li>
						</ul>
					</nav>

				</div>
			</header>

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

			<!-- Main -->
			<div id="main">
				<div class="inner">
					<header>	
						<p>Current VelociTech projects</p>
					</header>
					<section class="tiles">
						
                        <?php
                            include ('assets/php/db_connect.php');
        
                            $sqlget = "SELECT * FROM `projectList`;";
                            $stmt = mysqli_query ($conn, $sqlget) or die ('data error');
                            $count = 1;

                            while($row = mysqli_fetch_assoc($stmt)){
                    
                                $style = "style".$count;
                                              
                                echo "<article class='",$style,"'>";
                                echo "<span class='image'>";
                                echo "<img src='images/",$row['projectPicture'],"' alt='' />";
                                echo "</span>";
                                echo "<a href=",$row['projectLink'],">";
                                echo "<h2>",$row['projectName'],"</h2>";
                                echo "<div class='content'>";
                                echo "<p>",$row['projectShortDescription'],"</p>";
                                echo "</div>";
                                echo "</a>";
                                echo "</article>"; 
                    
                                $count = $count + 1;
                                if ($count>15) $count === 1;
                            }
                        ?>
                    </section>
				</div>
			</div>

			<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<section>
						<h2>Get in touch</h2>

                        <!--Email Form-->
						<form method="post" action="assets/php/emailform.php">

							<div class="fields">
								<div class="field half">
									<input type="text" name="name" id="name" placeholder="Name" />
								</div>

								<div class="field half">
									<input type="email" name="email" id="email" placeholder="Email" />
								</div>

								<div class="field">
									<textarea name="message" id="message" placeholder="Message"></textarea>
								</div>
							</div>

							<ul class="actions">
								<li>
                                    <input type="submit" value="Send" href="emailform.php"/>
                                    <!--<a href="emailform.php">Email Form</a>-->
                                </li>
							</ul>
						</form>
					</section>
					<section>
						<h2>Follow</h2>
						<ul class="icons">
							<!--<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
							<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
							<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>-->
							<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
						</ul>
					</section>
					<ul class="copyright">
						<li>&copy; VelociTech Software Solutions. All rights reserved</li>
					</ul>
				</div>
			</footer>
		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
            
    </body>
</html>