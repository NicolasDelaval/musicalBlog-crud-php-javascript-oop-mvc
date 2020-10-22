<?php $title = 'Espace Administrateur'; ?>
<h1>Bienvenue sur votre espace de travail Administrateur !</h1>
<h2>Vue d'ensemble</h2>
<div class="row">
   <div class="col-sm-3">
      <div class="well">
         <h3><span class="glyphicon glyphicon-cd"></span> Disquaires membres</h3>
         <p class="countInfo"><?= $storesNb['storesNb'] ?></p>
      </div>
   </div>
   <div class="col-sm-3">
      <div class="well">
         <h3><span class="glyphicon glyphicon-book"></span> Articles crées</h3>
         <p class="countInfo"><?= $postsNb['postsNb'] ?></p>
      </div>
   </div>
   <div class="col-sm-3">
      <div class="well">
         <h3><span class="glyphicon glyphicon-comment"></span> Commentaires publiés</h3>
         <p class="countInfo"><?= $commentsNb['commentsNb'] ?></p>
      </div>
   </div>
   <div class="col-sm-3">
      <div class="well">
         <h3><span class="glyphicon glyphicon-user"></span> Utilisateurs enregistrés</h3>
         <p class="countInfo"><?= $usersNb['usersNb'] ?></p>
      </div>
   </div>
</div>