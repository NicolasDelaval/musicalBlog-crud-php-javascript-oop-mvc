<?php $title = 'Modification d\'un article'; ?>
<h1>Modifier un article</h1>
<form method="post" action="index.php?action=PostsController-updatePost&amp;id=<?= $post->getId()?>" id="postsForm">
   <div class="form-group">
      <label for="titlePost" name="title">Titre de l'article</label>
      <input class="form-control" id="title" placeholder="Titre de l'article" type="text" name="titlePost" required value="<?= $post->getTitle()   ?>">
      <br/>
      <label for="content">Contenu de l'article</label>
      <textarea type="text" class="tinymce" id="content" name="contentPost"><?= $post->getContent()?></textarea>
      <br/>
      <input type="submit" value="Modifier" class="btn btn-primary btn-success" onclick="return(confirm('Confirmez-vous la modification de cet article ?'));" />
   </div>
</form>