<?php
session_start();
if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
    echo '<script>location.href = \'login.php\';</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<style>
    p{
      text-align: justify;  
    }
</style>
<body class="centerBody" onload="setActive('nav_about')">
    <?php include('include/navbar.php'); ?>
    <div class="container" style="margin-top: 30px; padding: 20px 40px 0px 40px;">
        <h1>Our Mission</h1>
        <p>
            At AutoEletrik, our mission is to revolutionize the electric vehicle industry by providing comprehensive resources and solutions to empower electric vehicle owners and enthusiasts worldwide.
        </p>            
        
        <h1>Our Story</h1>
        <p>
        AutoEletrik was conceived with a singular vision: to accelerate the transition to electric vehicles and champion sustainable mobility. Recognizing the urgent need to address environmental concerns and reduce carbon emissions, the founders of AutoEletrik set out to create a centralized hub of information and resources for electric vehicle enthusiasts and newcomers alike. By providing accessible and comprehensive guidance on electric vehicles, from purchasing advice to maintenance tips, AutoEletrik aims to demystify the world of EVs and empower individuals to make informed decisions that benefit both the planet and future generations. With a commitment to environmental stewardship and a passion for innovation, AutoEletrik is driving change one electric mile at a time.
        </p> 

        <h1>Our Values</h1>
        <p>
            At AutoEletrik, we are committed to:
            <ul>
                <li>Sustainability: Driving the transition to a greener future.</li>
                <li>Accessibility: Making electric vehicles accessible to all.</li>
                <li>Innovation: Pushing the boundaries of electric vehicle technology.</li>
            </ul>
        </p>
        
        <h1>Get in Touch</h1>
        <p>
        Have questions or feedback? We'd love to hear from you! Reach out to us at contact@autoeletrik.com or connect with us on <a href="https://twitter.com/autoeletrik">Twitter</a>.
        </p>
    </div>
</body>
</html>