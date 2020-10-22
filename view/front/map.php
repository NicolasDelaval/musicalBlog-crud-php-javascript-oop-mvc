<?php $title = 'Carte des disquaires'; ?>
<div class="container">
   <h1>Carte des disquaires</h1>
   <div class="stores-map">
      <div id="map"></div>
   </div>
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content storesCard">
            <div class="modal-header">
               <h3 class="modal-title titleStore"></h3>
               <h4>Genre musical proposé : <span class="genre"></span></h4>
            </div>
            <div class="modal-body storesCardBody">
               <div id="pano"></div>
               <br/>
               <h5>Adresse :</h5>
               <ul>
                  <li class="address"></li>
                  <li class="zipcode"></li>
                  <li class="city"></li>
               </ul>
               <h5>Coordonnées de contact :</h5>
               <ul>
                  <li class="phone"></li>
                  <li class="email"></li>
                  <li class="website"></li>
               </ul>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default btn-danger" id="closeMap" data-dismiss="modal">Fermer</button>
            </div>
         </div>
      </div>
   </div>
</div>




