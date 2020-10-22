<!DOCTYPE html>
<html lang="fr">
   <head>
      <title><?= $title ?></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="./public/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="./public/css/back-style.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <header>
         <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                  </button>
                  <a class="navbar-brand" href="index.php?action=MainController-displayHomeAdmin">Admin-B-C-Disquaires</a>
               </div>
               <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                     <li><a href="index.php?action=MainController-displayHomeAdmin"><span class="glyphicon glyphicon-dashboard"></span> Tableau de bord</a></li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cd"></span>  Gestion des Disquaires<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="index.php?action=StoresController-displayCreateStoreForm"><span class="glyphicon glyphicon-pencil"></span> Créer un nouveau disquaire</a></li>
                           <li><a href="index.php?action=StoresController-displayAllStores"><span class="glyphicon glyphicon-scissors"></span> Modifier un disquaire</a></li>
                           <li><a href="index.php?action=StoresController-displayAllStores"><span class="glyphicon glyphicon-trash"></span> Supprimer un disquaire</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-book"></span>  Gestion des Articles<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="index.php?action=PostsController-displayCreatePostForm"><span class="glyphicon glyphicon-pencil"></span> Créer un nouvel article</a></li>
                           <li><a href="index.php?action=PostsController-displayPostsList"><span class="glyphicon glyphicon-scissors"></span> Modifier un article</a></li>
                           <li><a href="index.php?action=PostsController-displayPostsList"><span class="glyphicon glyphicon-trash"></span> Supprimer un article</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-comment"></span>  Gestion des Commentaires<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="index.php?action=CommentsController-getCommentsList"><span class="glyphicon glyphicon-trash"></span> Supprimer un commentaire</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>  Gestion des utilisateurs<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="index.php?action=UsersController-displayAllUsers"><span class="glyphicon glyphicon-scissors"></span> Modifier un utilisateur</a></li>
                           <li><a href="index.php?action=UsersController-displayAllUsers"><span class="glyphicon glyphicon-trash"></span> Supprimer un utilisateur</a></li>
                        </ul>
                     </li>
                  <ul class="nav navbar-nav navbar-right">
                     <li><a href="index.php?action=UsersController-signOut"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <div class="container myMainContainer">
         <?= $content ?>
      </div>
      <footer class="page-footer font-small blue fixed-bottom">
         <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="http://bearcreation.fr">Bearcreation.fr</a>
         </div>
      </footer>
      <script src="./public/js/jquery.js"></script>
      <script src="./public/tinymce/tinymce.min.js"></script>
      <script src="./public/tinymce/init-tinymce.js"></script>
      <script src="./public/bootstrap/js/bootstrap.js"></script>
   </body>
</html>