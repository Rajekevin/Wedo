<?php

if (isset($_GET['accept-cookies'])) {
    # code...

    setcookie('accept-cookies', 'true',time()+31556925);

    header('Location: ./');
}

?>




<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="It's time to be awesome !" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta property="og:image" content="<?= WEBROOT; ?>/public/img/wedo.png" />
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/footer.css" />
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/form.css" />
         <link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/membre.css" />
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>/public/css/cookie.css" />
        <link rel="stylesheet" href="<?= WEBROOT; ?>/public/css/font-awesome/css/font-awesome.min.css" > 



        <title>Wedo</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




      <!--   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
        <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900' rel='stylesheet' type='text/css'> -->
        <link rel="icon" type="image/png"     href="public/img/favicon.jpg">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


        <!--SMOOTHSCROLL -->
        <script>
            $(document).ready(function() {
                $('.js-scrollTo').on('click', function() { // Au clic sur un élément
                    var page = $(this).attr('href'); // Page cible
                    var speed = 750; // Durée de l'animation (en ms)
                    $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
                    return false;
                });
            });
        </script>
      <!--END SMOOTHSCROLL -->

    </head>


<body>
    <header class="scroll">
        <div class="content">
            <div class="logo"><a href="/wedo/index">
            <img src="<?= WEBROOT; ?>public/img/wedo/logo.gif" alt="Wedo Logo"><p>It's time to be awesome !</p></a></div>
            <nav>
                <ul>   <?php
                            if (isset($_SESSION['login']))
                            {
                        ?>

                    <li>Bienvenue <?php echo $_SESSION['login'];?></li>
                     <li><a  class="js-scrollTo" href="<?= LINK; ?>user/profil?login=<?php echo  $_SESSION['login']; ?>">Mon Profil</a></li>



                    <li><a class="js-scrollTo" href="<?= LINK; ?>user/deconnexion">Deconnexion</a></li>
                    <li>
                    <a class="js-scrollTo" href="#Musculation">Musculation</a>
                      

                    </li>
                    <li><a class="js-scrollTo" href="<?= WEBROOT; ?>index#Fitness">Fitness</a></li>
                 <!--    <li><a href="">Articles</a>
                         <ul class="sous_menu">
                            <li><a href="">Musculation</a></li>
                            <li><a href="">Fitness</a></li>

                        </ul>
                    </li> -->
                    <li><a class="js-scrollTo" href="<?= LINK; ?>article/all">Article</a></li>
                    

                    
                         <?php
                            }
                            else
                            {
                                ?>    
                                <li>
                                <a class="js-scrollTo" href="#Musculation">Musculation</a>

                    </li>
                    <li><a class="js-scrollTo" href="<?= WEBROOT; ?>index#Fitness">Fitness</a></li>                   

                    <li><a class="js-scrollTo" href="<?= WEBROOT; ?>user/subscribe">Inscription</a></li>
                    <li><a href="<?= WEBROOT; ?>user/login">Connexion</a></li>
                    <li><a class="js-scrollTo" href="<?= LINK; ?>article/all">Article</a></li>

                        <?php
                            }
                        ?>
                    <li><a class="js-scrollTo" href="#contact">Contact</a>

                    </li>

                </ul>
            </nav>
    
        </div>
    </header>
<br/><br/><br/> <br/><br/>


 <?php include $this->view;?>




<!--WEDO FOOTER-->

  <footer id="contact" class="footer-distributed">

            <div class="footer-left">

                <!-- <h3>WEDO<span>logo</span></h3> -->
        <a href="#" class="footer__logo"></a>

                <p class="footer-links">
                    <a href="<?= LINK.'index'; ?>">Accueil</a>
                    ·
                    <a href="<?= LINK.'article/show/musculation'; ?>">Musculation</a>
                    ·
                    <a href="<?= LINK.'article/show/fitness'; ?>">Fitness</a>
                    ·
                    <a href="<?= WEBROOT.'reglement'; ?>">Mentions Légales</a>
                </p>

                <p class="footer-company-name">Designed, Developed &amp; Hosted By Wedo &copy; 2016
                   <br> All Rights Reserved
                </p>

            <div id="socialicons">
                <p><a>Suivez-nous</a></p>
            <a class="icon" href="https://twitter.com/WedoAwesome" title="Follow with Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="icon" href="https://www.facebook.com/WEDO-1704124243137727/" title="Follow with Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="icon" href="https://www.instagram.com/wedoawesomeofficial/" title="Follow with Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
            <a class="icon" href="https://plus.google.com/105054521400131253436/posts" title="Follow with Google Plus" target="_blank"><i class="fa fa-google-plus" aria-hidden="true" ></i></a>
        </div>

                <div class="footer-icons">

                
                  <!--   <a href="#"><li class="youtube"></li></a> -->




                      <a href="<?= WEBROOT; ?>/rss/feed/rssWedo" class="rss" target="_blank">
                            <i class="fa fa-rss-square" aria-hidden="true" style="color: white;"></i>
                            Flux RSS News
                        </a>
                </div>



<!--
                 <div class="footer-newsletter">
                    <form id="newsletterForm" name="newsletter" action="" method="post">
                        <p>Abonnez vous à notre newsletter</p>
                        <input placeholder="Email" type="email" name="email" id="email" required="" />
                        <input type="hidden" name="newsletter" value="6se84f3" />
                        <input type="submit" name="Envoyer" id="submit" />
                    </form>
                </div> -->



            </div>

            <div class="footer-right">



            <p>Contactez Nous</p>

                <?php 

                if(isset($ail_error)){
                 echo $ail_error;
                }
                 ?>

                   <?php 

                if(isset($msg_send)){
                 echo $msg_send;
                }
                 ?>


                <form id="contactForm contact" name="contact" id="contact" onsubmit="return validateFormOnSubmit(this)" action="" method="post">

                     <div>
                        <input placeholder="Nom" type="text" name="name" id="name" required="" tabindex="2" />
                        <div id="email-error" class="error"></div>
                    </div>



                    <div>
                        <input placeholder="Prenom" type="text" name="firstname" id="firstname"  required=""tabindex="2" />
                        <div id="email-error" class="error"></div>
                    </div>

                    <div>
                        <input placeholder="Email" type="text" name="email" id="email" required="" tabindex="2" />
                        <div id="email-error" class="error"></div>
                    </div>
                    <div>
                       <textarea placeholder="message"  name="content"> </textarea>
                        <div id="message-error" class="error"></div>
                    </div>
                    <input type="hidden" name="contact" value="6se84f3" />
                    <div>
                        <input type="submit" name="Envoyer" id="contact" name="contact" tabindex="2">
                    </div>
                </form>
            </div>
        </footer>
        </body>


<!--END WEDO FOOTER-->

 <script src="../public/js/cookie.js"></script>
  <script src="../public/js/jQuery.js"></script>
<?php 

if (!isset($_COOKIE['accept-cookies'])) {
    # code...

?>
<div class="cookie-banner">
    <div class="container">
    En poursuivant votre navigation, vous nous donnez l'autorisation de créer et utiliser des cookies 
    <a href="?accept-cookies" class="button">Ok, continuer</a>
    </div>

</div>

<?php
}
?>

</html>
