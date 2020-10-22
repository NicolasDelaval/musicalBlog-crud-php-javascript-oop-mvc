<!DOCTYPE html>
<html lang="fr">
   <head>
      <title><?= $title ?></title>
      <meta charset="utf-8">
      <meta name="description" content="A-B-C-Disquaires, l'annuaire français des disquaires indépendants" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" type="image/ico" href="public/img/favicon/favicon.ico" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="public/css/front-style.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <header>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>                        
               </button>
               <a class="navbar-brand" href="index.php?action=home">A-B-C-Disquaires</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li><a href="index.php?action=home"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
                  <li><a href="index.php?action=StoresController-displayMap"><span class="glyphicon glyphicon-cd"></span>Trouver un disquaire</a></li>
                  <li><a href="index.php?action=PostsController-displayAllPosts"><span class="glyphicon glyphicon-music"></span>Blog</a></li>
               </ul>

               <ul class="nav navbar-nav navbar-right">
                     <?php if(isset($_SESSION['id'])) {?>
                     <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>  <?= 'Bienvenue ' . htmlspecialchars($_SESSION['username'])?></a></li>
                     <?php } else { ?>
                     <li><a href="index.php?action=UsersController-viewRegister" data-toggle="modal" data-target="#modalReg"><span class="glyphicon glyphicon-user"></span>  S'enregistrer</a></li>
                     <div class="modal fade text-center" id="modalReg">
                        <div class="modal-dialog">
                           <div class="modal-content"></div>
                        </div>
                     </div>
                     <?php }?>
                     <?php if(isset($_SESSION['id'])) {?>
                     <li><a href="index.php?action=UsersController-signOut"><span class="glyphicon glyphicon-log-out"></span>  Se déconnecter</a></li>
                     <?php } else { ?>
                     <li><a href="index.php?action=UsersController-viewSignIn" data-toggle="modal" data-target="#modaLogin"><span class="glyphicon glyphicon-log-in"></span>  Se connecter</a></li>
                     <div class="modal fade text-center" id="modaLogin">
                        <div class="modal-dialog">
                           <div class="modal-content"></div>
                        </div>
                     </div>
                     <?php }?>
                  </ul>
            </div>
         </div>
      </nav>
      </header>
     
      <div class="container-fluid myMainContainer">
         <?= $content ?>
      </div>

       <footer class="page-footer font-small blue">
         <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="http://bearcreation.fr">Bearcreation.net</a>
         </div>
      </footer>
      <script src="public/js/jquery.js"></script>
      <script src="public/js/ajaxget.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFdGq0NzDO-aJ-Ng6yZhM52lZiwrj8uaA"></script> 
      <script src="public/js/script.js" defer></script>
      <script src="public/js/markerclusterer.js"></script>
      <script src="public/bootstrap/js/bootstrap.js"></script>
   </body>
</html>