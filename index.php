<?php
require('public/init.inc.php');
require('public/Contact.class.php');

//recuperation des info utilisateur (moi)
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>


<?php 

// on vérifie que le formulaire a bien été posté
if (!empty($_POST)) {
    // on éclate le tableau avec la méthode EXTRACT(), ce qui nous permet d'accéder directement aux champs par des variables
 extract($_POST);


// on effectue une validation des données du formulaire et notamment on vérifie la validité de l'email
 $valid = (empty($co_nom) || empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL) || empty($co_sujet) || empty($co_message)) ? false : true; // écriture ternaire pour if / else


// si tous les champs sont correctement renseignés
    if ($valid) {
        // on crée un nouvel objet (ou une instance) de la classe Contact.class.php
        $contact = new Contact();
// on utilise la méthode insertContact de la classe Contact.class.php
        $contact->insertContact($co_nom, $co_email, $co_sujet, $co_message);

        // on utilise la méthode sendMail de la classe Contact.class.php
        //$contact->sendEmail($sujet, $email, $message);
        // on efface les valeurs du formulaires
        unset($co_nom);
        unset($co_email);
        unset($co_sujet);
        unset($co_message);

        // on créé une variable de succès
        $success = 'Message envoyé !';
    }

}
 ?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Hadi-SMAIL</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public/css/vendor.css">
    <link rel="stylesheet" href="public/css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <script src="https://use.fontawesome.com/01e47cb12c.js"></script>
</head>

<body id="top">

    <!-- header
    ================================================== -->
     <header class="s-header">

        <div class="header-logo">
            <a class="smoothscroll site-logo" href="#home"><img src="public/images/3283885.png"></a>
        </div>

        <nav class="header-nav-wrap">
            <ul class="header-nav">
                <!-- <li class="current"><a class="smoothscroll"  href="#home" title="home">Acceuil</a></li> -->
                <li><a class="smoothscroll"  href="#about" title="about">À propos de moi</a></li>
                <li><a class="smoothscroll"  href="#competences" title="competences">COMPETENCES</a></li>
                <li><a class="smoothscroll"  href="#Experiences" title="Experiences">EXPERIENCES</a></li>
                <li><a class="smoothscroll"  href="#Formation" title="Formation">FORMATION</a></li>
                <!-- <li><a class="smoothscroll"  href="#blog" title="blog">Blog</a></li> -->
                <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
            </ul>
        </nav>

        <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

    </header> <!-- end s-header -->

    

   <!-- Acceuil================================================== -->
   <section id="home" class="s-home page-hero target-section" data-parallax="scroll"  data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h3>BONJOUR</h3>

                <h1>
                   <p class="holder">
                        <?php echo $ligne_utilisateur['prenom'];?> <?php echo $ligne_utilisateur['nom'];?> . <br>
                   Développeur Intégrateur WEB/ Designer  <br>
                    Basé sur Paris.
                   </p>
                </h1>

                <a href="#contact" class="contact smoothscroll"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>

                <div class="home-content__buttons">
                    <a href="#about" class="smoothscroll btn btn--stroke">
                        PLUS SUR MOI
                    </a>
                </div>

                <div class="home-content__scroll">
                    <a href="#about" class="scroll-link smoothscroll">
                        <span>Défiler vers le bas</span>
                    </a>
                </div>

            </div>

        </div>
        <!-- reseau  -->
        <ul class="home-social">
            <!-- <li>
                <a href="#"><i class="im im-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li> -->
            <li>
                <a href="https://twitter.com/dadi_smail"><i class="im im-twitter" aria-hidden="true"></i><span>Twitter</span></a>
            </li>
            <!-- <li>
                <a href="https://www.instagram.com/?"><i class="im im-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li> -->
            <li>
                <a href="https://www.pinterest.fr/dadi922/"><i class="im im-pinterest" aria-hidden="true"></i><span>Pinterest</span></a>
            </li>
        </ul> 
        <!-- fin reseau -->
    </section> <!-- Acceuil -->


   
    <!--  À PROPOS DE MOI===================== -->
    <section id="about" class="s-about target-section">
        
        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full text-center">
                <h3 class="title-color">À PROPOS DE MOI</h3>
                <!-- <h1>presentation</h1> -->
                <p class="present">je m’appelle Hadi Smail, je suis développeur intégrateur depuis  plus d'un an , J'ai  suivi une formation de niveau BAC +2 reconnue RNCP à l’école 3W Academy  qui a duré 3 mois, puis par la suite pour me perfectionner j'ai suivi une autre formation de 10 mois au PoleS  qui m'a permis de solidifier mes compétences.
                Je suis actuellement  a la recherche d'un poste de développeur.  </p>
            </div>
        </div>
    </section> <!-- end about -->
    <div class="black">.</div>


        <!-- competences -->
    <section id="competences" class="s-competences target-section"> <!-- end about -->
        <div  class="row ">
            <div class="col-full text-center">
                <h3 class="title-color">Mes compétences</h3>
                 <?php
                $resultat = $pdo -> prepare("SELECT * FROM t_competences WHERE utilisateur_id ='1'");
                $resultat->execute();

                /*$
                ligne_competence = $resultat -> fetch();*/
                ?>
                <?php while ($ligne_competence = $resultat -> fetch()) { ?>
                                                
                <ul class="skill-bars">
                    <li>
                    <div class="progress  " style="width:<?= $ligne_competence['c_niveau'];?>%"><span><?= $ligne_competence['c_niveau'];?>%</span>
                    </div>
                    <strong><?= $ligne_competence['competence'];?></strong>
                    </li>    
                </ul>
                <?php } ?>
            </div>
        </div> <!-- fin competences -->
        <!-- bouton CV -->
        <div class="row about-content about-content--buttons">

            <div class="col-six tab-full left">
                <a href="public/CV Hadi Smail.pdf" class="btn btn--primary full-width">TÉLÉCHARGER MON CV</a>
            </div>
            <div class="col-six tab-full right">
                <a href="#contact" class="smoothscroll btn btn--primary full-width">ENGAGEZ-MOI MAINTENANT</a>
            </div>
        </div> <!-- fin de bouton CV -->
    </section> <!-- end about -->
    <div class="black">.</div>



        <!-- Experiences -->
    <section id="Experiences" class="s-Experiences target-section">
        <div   class="row about-content about-content--timeline">
            <div class="col-full text-center">
                <h3 class="title-color">Mes Experiences</h3>

            <?php /*recuperation des experiences*/
                $resultat = $pdo -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id ='1'");
                 $resultat->execute();?>
                <?php $tab_xp=["",""]; 
                    $i=0;
                
                //<!-- boucle d\'experiences -->
                  while ($ligne_experience = $resultat -> fetch()) { 
                    
                             $tab_xp[$i%2].='<div class="timeline__block"><div class="timeline__bullet"></div><div class="timeline__header"><p class="timeline__timeframe">' . $ligne_experience['e_dates'] . '</p><h3>'. $ligne_experience['e_titre'].'</h3><h5>'. $ligne_experience['e_soustitre'].'</h5></div><div class="timeline__desc"><p>'. $ligne_experience['e_description'].'</p></div></div>'; 
                           
                            
                        
                 $i++;} 
                for($j=0; $j<count($tab_xp);$j++){ ?>

                    <div class="col-six tab-full  ">
                        <div class="timeline">
                            <?php echo $tab_xp[$j]; ?>
                        </div> <!-- end timeline -->
                    </div> <!-- end left -->
               <?php } ?>
                
            </div> <!-- end timeline -->
        </div> <!-- end left -->
    </section>
    <div class="black">.</div>


        <!-- formation -->
    <section id="Formation" class="s-Formation target-section">
         <div  class="row about-content about-content--timeline">
            <div class="col-full text-center">
                <h3 class="title-color">Mes Formations</h3>

            <?php /*recuperation des formation*/
                $resultat = $pdo -> prepare("SELECT * FROM t_formations WHERE utilisateur_id ='1'");
                    $resultat->execute();
                     $tab_xp=["",""]; 
                    $i=0;
                

                    while ($ligne_experience = $resultat -> fetch()) { 
                    
                    $tab_xp[$i%2].='<div class="timeline__block"><div class="timeline__bullet"></div><div class="timeline__header"><p class="timeline__timeframe">' . $ligne_experience['f_dates'] . '</p><h3>'. $ligne_experience['f_titre'].'</h3><h5>'. $ligne_experience['f_soustitre'].'</h5></div><div class="timeline__desc"><p>'. $ligne_experience['f_description'].'</p></div></div>'; 
                           
                            
                        
                 $i++;} 
                for($j=0; $j<count($tab_xp);$j++){ ?>

                    <div class="col-six tab-full  ">
                        <div class="timeline">
                            <?php echo $tab_xp[$j]; ?>
                        </div> <!-- end timeline -->
                    </div> <!-- end left -->
               <?php } ?>
                
            </div> <!-- end timeline -->
        </div> <!-- end left -->
    </section>
    <div class="black">.</div>







                 
            

    <!-- <section id="blog" class="s-blog target-section">

        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full">
                <h3>Journal</h3>
                <h1>Latest From The Blog.</h1>
                <p class="lead">Lorem ipsum Dolor adipisicing nostrud et aute. 
                Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum 
                ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.</p>
            </div>
        </div>

        <div class="row blog-content">
            <div class="col-full">

                <div class="blog-list block-1-2 block-tab-full">
                    <article class="col-block">
                                
                        <div class="blog-date">
                            <a href="blog-single.html">Sept 16, 2017</a>
                        </div>  
                        
                        <h2 class="h01"><a href="blog-single.html">The 10 Golden Rules of Clean Simple Design.</a></h2>
                        <p>
                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh..
                        </p>

                        <div class="blog-cat">
                                <a href="blog.html">Branding</a><a href="blog.html">Design</a>
                        </div>

                        
                    </article>
                    <article class="col-block">
                                
                        <div class="blog-date">
                            <a href="blog-single.html">Sept 15, 2017</a>
                        </div>  
                        
                        <h2 class="h01"><a href="blog-single.html">Photography Can Improve Your Graphic Design.</a></h2>
                        <p>
                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh..
                        </p>

                        <div class="blog-cat">
                            <a href="blog.html">Photography</a>
                        </div>

                        
                    </article>
                    <article class="col-block">
                        
                        <div class="blog-date">
                            <a href="blog-single.html">Sept 14, 2017</a>
                        </div>

                        <h2 class="h01"><a href="blog-single.html">Workspace Design Trends and Ideas.</a></h2>
                        <p>
                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh dolore irure esse Duis nulla sint.
                        </p>

                        <div class="blog-cat">
                            <a href="blog.html">Branding</a><a href="blog.html">Wordpress</a>
                        </div>
                    </article>
                    <article class="col-block">
                        
                        <div class="blog-date">
                            <a href="blog-single.html">Sept 12, 2017</a>
                        </div>    
                        <h2 class="h01"><a href="blog-single.html">Using Patterns in your Branding.</a></h2>
                        <p>
                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh.
                        </p>

                        <div class="blog-cat">
                            <a href="blog.html">Design</a><a href="blog.html">Branding</a>
                        </div>
                    </article>
                </div> <!-- end blog-list

            </div> <!-- end col-full -->
        <!-- </div> end blog-content

    </section> --> <!-- end s-blog --> 
 



    <!-- s-stats
    ================================================== -->
    <section id="stats" class="s-stats">
        <div class="row block-1-3 block-tab-1-2 block-mob-full stats">

            
            <div class="col-block stats__col">
                <div class="stats__count">
                    500
                </div>
                <h4>Tasses de café</h4>
            </div>
            <div class="col-block stats__col stats__col--highlight">
                <div class="stats__upsign">
                    <a href="#"><i class="im im-arrow-up" aria-hidden="true"></i></a>
                </div>
                <div class="stats__count">
                    33
                </div>
                <h4>Projets terminés</h4>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">
                    30
                </div>
                <h4>Clients heureux</h4> 
            </div>

        </div>
    </section> <!-- end s-stats -->


    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact target-section">

        <div class="overlay"></div>

        <div class="row narrow section-intro">
            <div class="col-full">
                <h3 class="">Contactez-moi</h3>
            </div>
        </div>

        <div class="row contact__main">
            <div class="col-eight tab-full contact__form">
                
                <form name="" id="" method="POST" action="index.php#contact">
                    <fieldset>
    
                    <div class="form-field">
                        
                        <input name="co_nom" type="text" id="contactName" placeholder="Nom"    class="full-width">
                    </div>
                    <div class="form-field">
                        
                        <input name="co_email" type="email" id="contactEmail" placeholder="Email"    class="full-width">
                    </div>
                    <div class="form-field">
                        
                        <input name="co_sujet" type="text" id="contactSubject" placeholder="Subjet" class="full-width">
                    </div>
                    <div class="form-field">
                        
                        <textarea name="co_message" id="contactMessage" placeholder="message" rows="10" cols="50"   class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        
                        <input type="submit" class="full-width" value="Envoyer" />
                    </div>
    
                    </fieldset>
                </form>          
            </div>


            <div class="col-four ">
                <h4 class="h06">téléphone</h4>
                <p>Téléphone: (+33)<?php echo $ligne_utilisateur['telephone'];?><br>Telephone: (+33)769600252</p>
                
                
                <h4 class="h06">Email</h4>
                <p>hadi.web@hotmail.fr<br>
                
                </p>

                <h4 class="h06">Adresse</h4>
                <p>
                    <?php echo $ligne_utilisateur['adresse'];?>
                <br>
                <?php echo $ligne_utilisateur['ville'];?>
                <br>
                <?php echo $ligne_utilisateur['code_postal'];?>
                </p>
            </div>

        </div>

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>
        <div class="row">
            <div class="col-full">

                <!-- <div class="footer-logo">
                    <a class="footer-site-logo" href="#0"><img src="images/3283885.png" alt="Homepage"></a>
                </div> -->

                <ul class="footer-social">
                    <!-- <li><a href="#0">
                        <i class="im im-facebook" aria-hidden="true"></i>
                        <span>Facebook</span>
                    </a></li> -->
                    <li><a href="https://twitter.com/dadi_smail">
                        <i class="im im-twitter" aria-hidden="true"></i>
                        <span>Twitter</span>
                    </a></li>
                    <!-- <li><a href="#https://www.instagram.com/?">
                        <i class="im im-instagram" aria-hidden="true"></i>
                        <span>Instagram</span>
                    </a></li> -->
                   <!--  <li><a href="#0">
                        <i class="im im-behance" aria-hidden="true"></i>
                        <span>Behance</span>
                    </a></li> -->
                    <li><a href="https://www.pinterest.fr/dadi922/">
                        <i class="im im-pinterest" aria-hidden="true"></i>
                        <span>Pinterest</span>
                    </a></li>
                </ul>
                    
            </div>
        </div>

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>copyright&copy;<?php echo date("Y"); ?></span> 
                    <span>Design by <a href="http://www.hadi-smail.com/">hadi-smail</a></span>
                    <span><a href="admin/index.php">admin</a></span>	
                </div>

                <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="im im-arrow-up" aria-hidden="true"></i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->


    </footer> <!-- end footer -->


    

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
