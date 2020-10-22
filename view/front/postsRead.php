<?php $title = 'A-B-C-Disquaires- ' . htmlspecialchars($post->getTitle()); ?>
<div class="container">
   <div class="news">
      <br>
      <h1><?= $post->getTitle() ?></h1>
      <br/>
      <p><span class="published">Publié le <?= $post->getDate()  ?></span> par <span class="author-shaping">A-B-C-Disquaires</span></p>
      <br/>
      <p>
         <?= nl2br($post->getContent()) ?>
      </p>
   </div>
   <h2>Commentaires</h2>
   <?php if(empty($comments)) {?>
   <p class="no-comments-yet">Pas de commentaires pour le moment, soyez le premier à réagir !</p>
   <br>
   <?php } else { ?>            
   <?php }?>
   <?php
      foreach ($comments as $data){
      ?>
   <div class="media">
      <div class="media-left">
         <img src="./public/img/avatar.png" class="media-object" alt="avatar picture" style="width:60px">
      </div>
      <div class="media-body">
         <h3 class="media-heading"><?= htmlspecialchars($data['username']) ?></h3>
         <p><?= nl2br(htmlspecialchars($data['contentComment']))?> </p>
         <p><span class="published">Publié le <?= htmlspecialchars($data['dateComment']) ?></span></p>
         <br />
      </div>
   </div>
   <?php
      }
      ?>
   <div class="comments-section">
      <br/>
      <h3 class="commentsTitle">Réagissez !</h3>
      <form role="form" action="index.php?action=CommentsController-createComment&amp;id=<?= htmlspecialchars($post->getId()) ?>" method="post">
         <small id="#" class="form-text text-muted">Vous devez être connecté pour commenter un article</small>
         <div class="form-group">
            <textarea class="form-control comment-form" rows="3" name="contentComment" required></textarea>
         </div>
         <div class="postButtonsDiv">
            <button type="submit" class="btn btn-primary btnSendComment">Envoyez votre commentaire</button>
            <a href="index.php?action=PostsController-displayAllPosts" class="btn btn-primary backHome">Retournez à la liste des billets</a>
         </div>
      </form>
      <br/>
   </div>
   <br />
</div>