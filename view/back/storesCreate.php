<?php $title = 'Créer un nouveau disquaire' ?>
<h1>Créer un nouveau magasin</h1>
<form action="index?action=StoresController-createStore" method="post" id="createStore">
   <div class="form-group">
      <label for="storename">Nom de l'établissement :</label>
      <input type="text" class="form-control" id="storename" name="storename">
   </div>
   <div class="form-group">
      <label for="siret">Siret :</label>
      <input type="text" class="form-control" id="siret" name="siret">
   </div>
   <div class="form-group">
      <label for="address">Adresse:</label>
      <input type="text" class="form-control" id="address" name="address">
   </div>
   <div class="form-group">
      <label for="zipcode">Code postal:</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode">
   </div>
   <div class="form-group">
      <label for="city">Ville:</label>
      <input type="text" class="form-control" id="city" name="city">
   </div>
   <div class="form-group">
      <label for="lat">Latitude:</label>
      <input type="text" class="form-control" id="lat" name="lat">
   </div>
   <div class="form-group">
      <label for="lng">Longitude:</label>
      <input type="text" class="form-control" id="lng" name="lng">
   </div>
   <div class="form-group">
      <label for="phone">Téléphone :</label>
      <input type="text" class="form-control" id="phone" name="phone">
   </div>
   <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" class="form-control" id="email" name="email">
   </div>
   <div class="form-group">
      <label for="website">Site web :</label>
      <input type="website" class="form-control" id="website" name="website">
   </div>
   <div class="form-group">
      <label for="genre">Genre musical principal :</label>
      <input type="text" class="form-control" id="genre" name="genre">
   </div>
   <button type="submit" class="btn btn-default btn-success">Créer un nouveau disquaire</button>
</form>