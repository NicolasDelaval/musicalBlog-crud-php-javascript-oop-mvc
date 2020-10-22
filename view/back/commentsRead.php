<?php $title = 'Gestions des commentaires' ?>
<h1>Tous les commentaires publiés par vos lecteurs</h1>
<div class="table-responsive">
   <table class="table table-hover">
      <thead>
         <tr>
            <th>Chapitre concerné</th>
            <th>Auteur du commentaire</th>
            <th>Date de publication du commentaire</th>
            <th>Contenu</th>
            <th>Action</th>
         </tr>
      </thead>
      <?php
         foreach ($allComments as $data) {
         ?>
      <tbody>
         <tr>
            <td><?= htmlspecialchars($data['titlePost']) ?></td>
            <td><?= htmlspecialchars($data['username']) ?></td>
            <td><span class="published">Publié le <?= $data['dateComment'] ?></span></td>
            <td><?= nl2br(htmlspecialchars(substr($data['contentComment'], 0, 100))); ?>[...]</td>
            <td><a href="index.php?action=CommentsController-deleteComment&amp;id=<?= htmlspecialchars($data['idComment']) ?>" class="btn btn-danger btn-block" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire?'));">Supprimer</a>
            <td>
         </tr>
      </tbody>
      <?php
         }
         ?>
   </table>
</div>

