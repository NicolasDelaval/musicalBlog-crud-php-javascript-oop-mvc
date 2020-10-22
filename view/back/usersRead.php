<?php $title = 'Liste des utilisateurs enregistrés' ?>
<h1>Tous les utilisateurs enregistrés</h1>
<div class="container">
   <div class="table-responsive">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>Prénom</th>
               <th>Nom</th>
               <th>Nom d'utilisateur</th>
               <th>Adresse Email</th>
               <th>Rôle</th>
               <th>Action</th>
            </tr>
         </thead>
         <?php
            foreach ($users as $data) {
            ?>
         <tbody>
            <tr>
               <td><?= $data->getFirstName() ?></td>
               <td><?= $data->getLastName() ?></td>
               <td><?= $data->getUsername() ?></td>
               <td><?= $data->getEmail() ?></td>
               <td><?= $data->getIdRole() ?></td>
               <td>
                  <a href="index.php?action=UsersController-displayUpdateUser&amp;id=<?= $data->getId()?>" class="btn btn-success btn-block">Modifier</a>
                  <a href="index.php?action=UsersController-deleteUser&amp;id=<?= $data->getId()?>" class="btn btn-danger btn-block" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet utilisateur ?'));">Supprimer</a>
               </td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </div>
</div>
