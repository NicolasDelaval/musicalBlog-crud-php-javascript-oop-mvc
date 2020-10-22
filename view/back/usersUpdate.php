<?php $title = 'Modifier un utilisateur' ?>
<div class="container">
   <form action="index?action=UsersController-updateUser&amp;id=<?= $user->getId()?>" method="post">
      <div class="form-group">
         <label for="firstname">Prénom:</label>
         <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user->getFirstname() ?>">
      </div>
      <div class="form-group">
         <label for="lastname">Nom de famille utilisateur:</label>
         <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user->getLastname() ?>">
      </div>
      <div class="form-group">
         <label for="username">Nom utilisateur:</label>
         <input type="text" class="form-control" id="username" name="username" value="<?= $user->getUsername() ?>">
      </div>
      <div class="form-group">
         <label for="email">Email:</label>
         <input type="text" class="form-control" id="email" name="email" value="<?= $user->getEmail() ?>">
      </div>
      <div class="form-group">
         <label for="idRole">Rôle:</label>
         <input type="text" class="form-control" id="idRole" name="idRole" value="<?= $user->getidRole() ?>">
      </div>
      <button type="submit" class="btn btn-default btn-success">Modifier</button>
   </form>
</div>