<?php 
  require_once('../incs/connexion.php');
  require_once('../incs/chargerClasse.php');
  require_once('../incs/functions.php');

  $categories = array();
  $categories = Categorie::get_all_categories();
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Bibliothèque</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/Alliance_française.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
 
    <div class="wrapper fixed__footer">
        
        <header id="header" class="htc-header header--3 bg__white">
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="acceuil.php">
                                    <img src="../images/Alliance_française.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="acceuil.php">Home</a></li>
                                    <li class="drop"><a href="livre.php">Livres</a></li>
                                    <li class="drop"><a href="membre.php">Membres</a>
                                         <ul class="dropdown">
                                            <li><a href="membre.php">Liste des membres</a></li>
                                            <li><a href="ancien_membre.php">Anciens membres</a></li>
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="#">Emprunt</a>
                                        <ul class="dropdown">
                                            <li><a href="ajout_emprunt.php">Emprunter pour un membre</a></li>
                                            <li><a href="emprunt.php">Emprunts en cours</a></li>
                                            <li><a href="historique_emprunt.php">Historique des emprunts</a></li>
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                    <li class="drop"><a href="acceuil.php">Home</a></li>
                                    <li class="drop"><a href="livre.php">Livres</a></li>
                                    <li class="drop"><a href="membre.php">Membres</a>
                                         <ul class="dropdown">
                                            <li><a href="membre.php">Liste des membres</a></li>
                                            <li><a href="ancien_membre.php">Anciens membres</a></li>
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="#">Emprunt</a>
                                        <ul class="dropdown">
                                            <li><a href="ajout_emprunt.php">Emprunter pour un membre</a></li>
                                            <li><a href="emprunt.php">Emprunts en cours</a></li>
                                            <li><a href="historique_emprunt.php">Historique des emprunts</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </nav>
                            </div>                         
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra"></ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            
        </header>
        
        
        <div class="body__overlay"></div>
        <div class="offset__wrapper">
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/logo/logo.png" alt="logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <ul class="sidebar__thumd">
                        <li><a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                    </ul>
                    <div class="offset__widget">
                        <div class="offset__single">
                            <h4 class="offset__title">Language</h4>
                            <ul>
                                <li><a href="#"> Engish </a></li>
                                <li><a href="#"> French </a></li>
                                <li><a href="#"> German </a></li>
                            </ul>
                        </div>
                        <div class="offset__single">
                            <h4 class="offset__title">Currencies</h4>
                            <ul>
                                <li><a href="#"> USD : Dollar </a></li>
                                <li><a href="#"> EUR : Euro </a></li>
                                <li><a href="#"> POU : Pound </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Follow Us On Social</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--twitter" href="#"  title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                            
                            <li><a class="bg--instagram" href="#" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                            <li><a class="bg--facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                            <li><a class="bg--googleplus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                            <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product/sm-img/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product/sm-img/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        
        </div>
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Ajouter Membre</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Ajouter Livre</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="login" method="get" action="../models/ajouter_membre.php">
                                    <input type="text" name="nom" placeholder="Nom">
                                    <input type="text" name="prenom" placeholder="Prénom">
                                    <input type="text" name="email" placeholder="Email">
                                
                                  <div class="tabs__checkbox">
                                  <span> Date de naissance:</span>
                                      <label for="jour">Jour:</label>
                                      <select name="jour" id="jour">
                                        <?php for($i = 1;$i<32;$i++){?>
                                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php } ?>  
                                      </select>
                                      <label for="mois">Mois:</label>
                                      <select name="mois" id="mois">
                                        <?php for($i = 1;$i<13;$i++){?>
                                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php } ?>  
                                      </select>
                                      <label for="annee">Annee:</label>
                                      <select name="annee" id="annee">
                                        <?php for($i = 1990;$i<2018;$i++){?>
                                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php } ?>  
                                      </select>
                                  </div>
                                  <div class="htc__login__btn mt--30">
                                      <input type="submit" value="AJOUTER">
                                  </div>
                                </form>
                                
                            </div>
                           
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form class="login" method="get" action="../models/ajouter_livre.php">
                                    <label for="categorie">Categorie:</label>
                                    <select name="nom_cat" id="categorie">
                                        <?php foreach($categories as $categorie){ ?>
                                          <option value="<?php echo $categorie->getNom_categorie();?>"><?php echo $categorie->getNom_categorie();?></option>
                                        <?php } ?>
                                    </select>

                                    <input type="text" placeholder="Titre" name="intitule">
                                    <input type="text" placeholder="Auteur" name="auteur">
                                    <input type="text" name="pages" placeholder="Nombre de pages">
                                    <input type="text" name="photo" placeholder="URL couverture">
                                
                                <div class="htc__login__btn">
                                        <input type="submit" value="AJOUTER">
                                </div>
                                </form>
                                
                            </div>
       
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
   
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                
               
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2021 <a href="#">Alliance Française 032 97 479 52</a>
                                    All Right Reserved.</p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="acceuil.php">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </footer>
 
    </div>


    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>