<?php $title = 'Liste des magasins enregistrés' ?>
<h1>Tous les disquaires enregistrés</h1>
<div class="table-responsive">
   <table class="table table-hover">
      <thead>
         <tr>
            <th>Nom</th>
            <th>Siret</th>
            <th>Adresse</th>
            <th>CP</th>
            <th>Ville</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Site Web</th>
            <th>Genre</th>
            <th>Action</th>
         </tr>
      </thead>
      <?php
         foreach ($stores as $data) {
         ?>
      <tbody>
         <tr>
            <td><?= $data->getStorename() ?></td>
            <td><?= $data->getSiret() ?></td>
            <td><?= $data->getAddress() ?></td>
            <td><?= $data->getZipcode() ?></td>
            <td><?= $data->getCity() ?></td>
            <td><?= $data->getPhone() ?></td>
            <td><?= $data->getEmail() ?></td>
            <td><?= $data->getWebsite() ?></td>
            <td><?= $data->getGenre() ?></td>
            <td>
               <a href="index.php?action=StoresController-displayUpdateStore&amp;id=<?= $data->getId()?>" class="btn btn-success btn-block">Modifier</a>
               <a href="index.php?action=StoresController-deleteStore&amp;id=<?= $data->getId()?>" class="btn btn-danger btn-block" onclick="return(confirm('Etes-vous sûr de vouloir supprimer  ce magasin ?'));">Supprimer</a>
            </td>
         </tr>
      </tbody>
      <?php
         }
         ?>
   </table>
</div>