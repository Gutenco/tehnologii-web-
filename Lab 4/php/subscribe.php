<!DOCTYPE html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/styleAfrica1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>form</title>
</head>
<body>


<div class="wrapper">
    <label for="toggle">
        <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="far fa-envelope"></i></div>
    <div class="content">
        <header>Become a Subscriber</header>
        <p>Subscribe to our blog and get the latest updates straight to your inbox.</p>
    </div>
    <form action="subscribe.php" method="POST">
        <?php
        $userEmail = ""; //mai întâi lăsăm câmpul de e-mail gol
        if(isset($_POST['subscribe'])){ //if subscribe btn clicked
            $userEmail = $_POST['email']; //obținerea e-mail introdus
            if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validarea e-mailului utilizatorului
                $subject = "Thanks for Subscribing ";
                $message = "Thanks for subscribing to our blog. You'll always receive updates from us. And we won't share and sell your information.";
                $sender = "From: gutenco.vladislav@gmail.com";
                //funcția php pentru a trimite e-mail
                if(mail($userEmail, $subject, $message, $sender)){
                    ?>
                    <!-- afișează mesajul de succes odată ce e-mailul a fost trimis cu succes -->
                    <div class="alert success-alert">
                        <?php echo "Thanks for Subscribing." ?>
                    </div>
                    <?php
                    $userEmail = "";
                }else{
                    ?>
                    <!-- arată mesajul de eroare dacă e-mailul nu poate fi trimis -->
                    <div class="alert error-alert">
                        <?php echo "Failed while sending your email!" ?>
                    </div>
                    <?php
                }
            }else{
                ?>
                <!-- afișează mesajul de eroare dacă e-mailul introdus nu este valid -->
                <div class="alert error-alert">
                    <?php echo "$userEmail is not a valid email address!" ?>
                </div>
                <?php
            }
        }
        ?>
        <div class="field">
            <label>
                <input type="text" class="email" name="email" placeholder="Email Address" required value="<?php echo $userEmail ?>">
            </label>
        </div>
        <div class="field btn">
            <div class="layer"></div>
            <button type="submit" name="subscribe">Subscribe</button>
        </div>
    </form>
    <div class="text">We do not share your information.</div>
</div>
