<title><?php $title = 'S\'enregistrer'; ?></title>
<div class="modal-header" style="padding:35px 50px;">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4><span class="glyphicon glyphicon-edit"></span> S'enregistrer</h4>
</div>
<div class="modal-body" style="padding:40px 50px;">
   <form action="index.php?action=UsersController-signUp" method="POST" id="regForm">
      <div class="form-group">
         <label for="firstname">Prénom</label>
         <input class="form-control" id="firstname" placeholder="Prénom" type="text" name="firstname" required>
      </div>
      <div class="form-group">
         <label for="lastname">Nom</label>
         <input class="form-control" id="lastname" placeholder="Nom" type="text" name="lastname" required>
      </div>
      <div class="form-group">
         <label for="siret">Nom d'utilisateur</label>
         <input class="form-control" id="username" placeholder="Nom d'utilisateur" type="text" name="username" required>
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" type="text" name="email" required>
      </div>
      <div class="form-group">
         <label for="pwd">Mot de passe</label>
         <input class="form-control" id="password" placeholder="Mot de passe" type="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Créer votre compte</button>
   </form>
</div>
<div class="modal-footer">
   <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
</div>
<script src="public/js/jquery.js"></script>
<script src="public/js/script.js"></script>