<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');

    $search = $_GET['emprunt_r'];
    
    $dbh = dbconnect();

                $sql = "SELECT * FROM emprunt JOIN membre ON emprunt.id_membre=membre.id_membre WHERE (nom_membre LIKE '%s' OR prenom_membre LIKE '%s' intitule_livre LIKE '%s') AND statut=FALSE";
                $sql = sprintf($sql , $search , $search , $search);
                $resultats = $dbh -> query($sql);
                $resultats ->SetFetchMode(PDO::FETCH_OBJ);
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Livres</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="shortcut icon" type="image/x-icon" href="images/Alliance_française.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    


    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
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
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                            </ul>
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
                                <form action="resultats_recherche_emprunt.php" method="get">
                                    <input placeholder="Search here... " type="text" name="emprunt_r">
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
            
            
        </div>

        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Résultats recherche emprunt</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="acceuil.php">Alliance Française</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Madagascar</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">

                    <div class="row">
                        <div class="col-md-12">



        <div class="wishlist-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">

                                <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Rendre emprunt</span></th>
                                                <th class="product-name"><span class="nobr">Prenom du membre</span></th>
                                                <th class="product-name"><span class="nobr">Nom du membre</span></th>
                                                <th class="product-name"><span class="nobr">Titre du livre</span></th>
                                                <th class="product-name"><span class="nobr">Emprunté depuis</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $resultats->fetch()) { ?>
                                            <tr>
                                                <td class="product-remove"><a href="../models/rendre_emprunt.php?id=<?php echo $row->id_emprunt; ?>">×</a></td>
                                                <td class="product-name"><?php echo $row->prenom_membre; ?></td>
                                                <td class="product-name"><?php echo $row->nom_membre; ?></td>
                                                <td class="product-price"><span class="amount"><?php echo $row->titre; ?></span></td>
                                                <td class="product-name"><?php echo $row->date_emprunt; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                </table>

                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>








                        </div>
                    </div>
                    
                    <div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                

                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                <p>© 2021 <a href="#">Alliance Française 032 97 479 52</a>
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
  
    <div id="quickview-wrapper">

        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="images/product/big-img/1.jpg">
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="rss" href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                            <li><a target="_blank" title="Linkedin" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                            <li><a target="_blank" title="Tumblr" href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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