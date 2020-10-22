<?php $title = 'Se connecter'; ?>
<div class="modal-header" style="padding:35px 50px;">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4><span class="glyphicon glyphicon-lock"></span> Se connecter</h4>
</div>
<div class="modal-body" style="padding:40px 50px;">
   <form role="form" action="index.php?action=UsersController-signIn" method="POST">
      <div class="form-group">
         <label for="email">Email</label>
         <input class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" type="text" name="email" required>
      </div>
      <div class="form-group">
         <label for="pwd">Mot de passe</label>
         <input class="form-control" id="pass" placeholder="Mot de passe" type="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Connexion</button>
   </form>
</div>
<div class="modal-footer">
   <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
</div>
<script src="public/js/jquery.js"></script>
<script src="public/js/script.js"></script>