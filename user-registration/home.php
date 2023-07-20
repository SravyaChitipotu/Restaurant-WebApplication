<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
    <link href="home_style.css" type="text/css"
	rel="stylesheet" />
</HEAD>
<BODY>
	<!-- <div class="phppot-container">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
		<div class="page-content">Welcome <?php //echo $username;?></div>
	</div> -->
    <div class="container">
    <header>
       <img src="images/CC_New.png" alt="logo">
    </header>

    <nav>
        <a href="#">HOME</a>
        <a href="../menu.php">MENU</a>
        <a href="../my_orders.php">MY ORDERS</a>
        <a href="../contact.php">CONTACT</a>
        <a href="#">WELCOME &nbsp<?php echo $username;?></a>  
        <a href="logout.php">LOGOUT</a></span>
    </nav>
    <main>
        <h1>
            let's meat
        </h1>
        <p>
            We love sharing good food with great people.We bring over 30 years industry experience and passion to our restaurant.With the dishes that are carefully designed to bring you a truly satisfying irish food experience that you are sure to remember   
        </p>

        <a href="mailto:sravyachitipotu@gmail.com"target="_blank">MAKE RESERVATION</a>

        
    </main>

    <section class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15316.72744972219!2d80.40234135541992!3d16.313649299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a4a757cd8aae1e7%3A0x3fa099e88c7ef144!2sA%20Cafe!5e0!3m2!1sen!2sin!4v1688652696399!5m2!1sen!2sin" width="1024" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    
    <footer>
         <p>
            All the images  credits goes to respective owners
         </p>
    </footer>

</div>
</BODY>
</HTML>
