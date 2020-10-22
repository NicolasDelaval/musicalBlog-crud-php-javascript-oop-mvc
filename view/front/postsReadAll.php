<?php $title = 'A-B-C-Disquaires- Tous les articles'?>
<div class="container">
   <div class="main-1">
      <h1>Tous les articles publiés</h1>
      <?php
         foreach ($posts as $data) {
         ?>
      <div class="news">
         <h2 class="subtitleNews"><a href="index.php?action=PostsController-displayPost&amp;id=<?= htmlspecialchars($data->getId()) ?>"><?= htmlspecialchars($data->getTitle()) ?></a></h2>
         <br/>
         <p><span class="published">Publié le <?= $data->getDate() ?></span> par <span class="author-shaping">A-B-C-Disquaires</span></p>
         <p>
            <?= nl2br(substr($data->getContent(), 0, 800)) ?>[...]
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="blogButtonsDiv">
               <a href="index.php?action=PostsController-displayPost&amp;id=<?= htmlspecialchars($data->getId()) ?>" class="btn btn-primary readMore">Lire la suite</a>
               <a href='index.php?action=home' class="btn btn-primary backHome">Retourner à l'accueil</a>
            </div>
            <br/>
            <br/>
         </p>
      </div>
      <?php
         }
         ?>
   </div>
</div>