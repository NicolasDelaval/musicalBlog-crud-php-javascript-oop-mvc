<?php $title= 'Rédaction d\'un nouvel article' ?>
<h1>Créer un nouvel article</h1>
<form method="post" action="index.php?action=PostsController-createPost">
   <div class="form-group" id="postsForm">
      <label for="titlePost" name="title">Titre de l'article</label>
      <input class="form-control" id="title" placeholder="Titre de l'article" type="text" name="titlePost" required value="">
      <br/>
      <label for="content">Contenu de l'article</label>
      <textarea type="text" class="tinymce" id="content" name="contentPost"></textarea>
      <br/>
      <input type="submit" value="Publier" class="btn btn-primary btn-success" onclick="return(confirm('Confirmez-vous la publication de ce nouvel article ?'));" />
   </div>
</form>