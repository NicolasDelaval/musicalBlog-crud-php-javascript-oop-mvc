<?php $title = 'Sélection d\'un article' ?>
<h1>Tous les articles publiés</h1>
<div class="table-responsive">
   <table class="table table-hover">
      <thead>
         <tr>
            <th>Titre de l'article</th>
            <th>Date de publication</th>
            <th>Contenu</th>
            <th>Action</th>
         </tr>
      </thead>
      <?php
         foreach ($posts as $data) {
         ?>
      <tbody>
         <tr>
            <td><?= $data->getTitle() ?></td>
            <td><span class="published">Publié le <?= $data->getDate() ?></span></td>
            <td><?= nl2br((substr($data->getContent(), 0, 100))); ?>[...]</td>
            <td><a href="index.php?action=PostsController-displayUpdatePost&amp;id=<?= htmlspecialchars($data->getId()) ?>" class="btn btn-success btn-block">Modifier</a><a href="index.php?action=PostsController-deletePost&amp;id=<?= htmlspecialchars($data->getId()) ?>" class="btn btn-danger btn-block" onclick="return(confirm('Confirmez-vous la suppression de cet article ?'));">Supprimer</a>
            <td>
            <td></td>
         </tr>
      </tbody>
      <?php
         }
         ?>
   </table>
</div>








