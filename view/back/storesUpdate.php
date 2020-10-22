<?php $title= 'Modifier un disquaire existant'; ?>
<h1>Modifier un magasin</h1>
<form action="index?action=StoresController-updateStore&amp;id=<?= $store->getId()?>" method="post">
   <div class="form-group">
      <label for="storename">Nom de l'établissement :</label>
      <input type="text" class="form-control" id="storename" name="storename" value="<?= $store->getStorename() ?>">
   </div>
   <div class="form-group">
      <label for="siret">Siret :</label>
      <input type="text" class="form-control" id="siret" name="siret" value="<?= $store->getSiret() ?>">
   </div>
   <div class="form-group">
      <label for="address">Adresse:</label>
      <input type="text" class="form-control" id="address" name="address" value="<?= $store->getAddress() ?>">
   </div>
   <div class="form-group">
      <label for="zipcode">Code postal:</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?= $store->getZipcode() ?>">
   </div>
   <div class="form-group">
      <label for="city">Ville:</label>
      <input type="text" class="form-control" id="city" name="city" value="<?= $store->getCity() ?>">
   </div>
   <div class="form-group">
      <label for="lat">Latitude:</label>
      <input type="text" class="form-control" id="lat" name="lat" value="<?= $store->getLatitude() ?>">
   </div>
   <div class="form-group">
      <label for="lng">Longitude:</label>
      <input type="text" class="form-control" id="lng" name="lng" value="<?= $store->getLongitude() ?>"> 
   </div>
   <div class="form-group">
      <label for="phone">Téléphone :</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?= $store->getPhone() ?>">
   </div>
   <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= $store->getEmail() ?>">
   </div>
   <div class="form-group">
      <label for="website">Site web :</label>
      <input type="text" class="form-control" id="website" name="website" value="<?= $store->getWebsite() ?>">
   </div>
   <div class="form-group">
      <label for="genre">Genre musical principal :</label>
      <input type="text" class="form-control" id="genre" name="genre" value="<?= $store->getGenre() ?>">
   </div>
   <button type="submit" class="btn btn-default btn-success">Modifier</button>
</form>