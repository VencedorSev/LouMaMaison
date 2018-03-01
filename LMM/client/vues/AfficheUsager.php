<!--
* @file         AfficheUsager.php
* @brief        Projet WEB 2
* @details      Affichage de profil d'usager - vue partielle
* @author       Bourihane Salim, Massicotte Natasha, Mercier Renaud, Romodina Yuliya - 15612
* @version      v.1 | fevrier 2018
-->

<?php              
    $messagerie = (isset($_SESSION["username"]) && $_SESSION["username"] == $data["usager"]->getUsername()) ? "Messagerie" : "Contacter";
 ?>


<div class="container detail">
    <!-- Tout le monde peut voir -->
    <div class="row">
        
          <div class="col-sm-12 succes_erreur">
			
          </div>
        
        
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6">
                    <div id="photo"> <img src="<?=$data["usager"]->getPhoto() ?>" class="img img-fluid"> </div>
                </div>
                <div class="col-md-6" id="div_info_nom">
                    <h3><?=$data["usager"]->getNom() ?> <?=$data["usager"]->getPrenom() ?></h3>
                </div>
				<div id="profilUser" class="col-md-12">
					<form class="form">
						<div class="col-md-12 form-group row" id="div_info_plus"></div>
						<div class="col-md-12 form-group row" id="div_info_contact"></div>
						<div class="col-md-12 form-group row" id="div_info_role"></div>						
						<div class="col-md-12 form-group row" id="div_modif_profil"></div>
						<input type="hidden" name="usernameProp" value="<?=$data["usager"]->getUsername();?>">
					</form>
				</div>
				
			<!-- Modal -->
			<div class="modal fade" data-animation="false" id="myModal<?=$_SESSION["username"]?>" role="dialog">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header bg-info">
					<h3 class="modal-title text-white">Modifier votre profil</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				  </div>
				  <div class="modal-body">
				  <form id="modifierProfil<?=$_SESSION["username"]?>">
					   <table class="table table-hover">
							<tbody>
								<tr>
									<td>Prénom</td><td><input type="text" name="prenom" id="prenom" value="<?= isset($data['prenom']) ? $data['prenom'] : '' ?>"><small class="form-text text-muted" id="aidePrenom"></small></td>
								</tr>
								
								<tr>
									<td>Nom</td><td><input type="text" name="nom" id="nom" value="<?= isset($data['nom']) ? $data['nom'] : '' ?>"><small class="form-text text-muted" id="aideNom"></small></td>			
								</tr>
								
								<tr>
									<td>Adresse</td><td><input type="text" name="adresse" id="adresse" value="<?= isset($data['adresse']) ? $data['adresse'] : '' ?>"><small class="form-text text-muted" id="aideAdresse"></small></td>
								</tr>
								
								<tr>
									<td>Téléphone</td><td><input type="text" name="telephone" id="telephone" value="<?= isset($data['telephone']) ? $data['telephone'] : '' ?>"><small class="form-text text-muted" id="aideTel"></small></td>
								</tr>
								
                                <tr>
									<td>
										<label for="paiement" class="form-control-label mr-sm-2">Type de paiement</label>
									</td>
									<td>
										<select class="" name="paiement" id="modePaiement">
									  <?php 
										foreach($data['modePaiementGeneral'] AS $p) {
											if(isset($data['modePaiement'][0]->id)) {
												if($data['modePaiement'][0]->id == $p['id']) { ?>
												  <option selected value=<?=  $p['id'] ?>><?= $p['modePaiement'] ?></option>
									  <?php     } 
												else { 
										?>
												  <option value=<?= $p['id'] ?>><?= $p['modePaiement'] ?></option>
									  <?php     }
											}
										
											  else { ?>
												<option value=<?= $p['id'] ?>><?= $p['modePaiement'] ?></option>
									  <?php   }
										}
											 ?>
										</select>
                                        <small class="form-text text-muted" id="aideModePaiement"></small>
									</td>
								</tr>
								
								<tr>
									<td>
										<label for="moyenComm" class="form-control-label mr-sm-2">Moyen de contact</label>
									</td>
									<td>
										<select name="moyenComm" class="" id="moyenComm">
									   		<?php foreach($data['modeCommunicationGeneral'] AS $c) { 
													if(isset($data['modeCommunication'][0]->id )) { 
													  if($data['modeCommunication'][0]->id  == $c['id']) { ?>
														<option selected value=<?= $c['id'] ?>><?= $c['moyenComm'] ?></option>
											<?php     } 
													  else { ?>
													  <option value=<?= $c['id'] ?>><?= $c['moyenComm'] ?></option>
											<?php     }
													} 
													else { ?>
													  <option value=<?= $c['id'] ?>><?= $c['moyenComm'] ?></option>
											<?php   }
												  } ?>
											</select>
                                        <small class="form-text text-muted" id="aideMoyenComm"></small>
									</td>
                                </tr>
								
                                <tr>
                                    <td>Mot de passe</td><td><input type="password" name="pwd0" id="pwd0"><small class="form-text text-muted" id="aidePwd0"></small></td>
                                </tr>
								
                                <tr>
                                    <td>Confirmer le mot de passe</td><td><input type="password" name="pwd1" id="pwd1"><small class="form-text text-muted" id="aidePwd1"></small></td>
                                </tr>
								
                                <tr>								
							</tbody>
						</table>
						<input type="hidden" name="idUser" value="<?=$_SESSION["username"]?>">
						<button type="button" id="submit_form<?=$_SESSION["username"]?>" class="btn btn-success sauvegarderForm">Sauvegarder</button>
					</form>
				  </div>
				  <div class="modal-footer bg-info">
                      <div class="erreurModif"></div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
				  </div>
				</div>
			  </div>
			</div>
	
            </div>
                             
        </div>
        <div class="col-md-8" >
			<div class="row  justify-content-end" >
                
                <ul class="nav menuProfil">
                    <li class="nav-item" id="div_messagerie"></li>
                    <li class="nav-item" id="div_historique"></li>
				    <li class="nav-item" id="div_reservations"></li>
				    <li class="nav-item" id="div_mes_appts"></li>
                
                </ul>
			</div>
			<div class="row" id="afficheInfoProfil">
				
			</div>
		</div>
    </div>
</div>

 <!-- Les gens connectes -->           
            <?php                                    
                if(isset($_SESSION["username"]) && $_SESSION["isActiv"] == 1 && $_SESSION["isBanned"] == 0) 
                {
            ?>
                <span id="info_contact"><div  class="form-group row mb-0">Moyen de contact : <?=$data["modeCommunication"][0]->moyenComm;?></div></span>
                <p class="nav-link" href="#" id="historique">Voyages</p>
                <p class="nav-link" name="<?=$messagerie?>" id="messagerie" value="<?=$_SESSION["username"]?>"><?=$messagerie?></p>

                <!-- S'il y a des appartements en cas de proprio -->
                    <?php 
                        if($data["isProprio"]) {
                    ?>
                       <p class="nav-link" href="#" id="mes_appts">Appartements</p>
                   <?php      
                    }
                    ?>

                <!-- Si c'est mon profil je peux le voir avec toute l'info et Admin et SuperAdmin aussi-->  
                <?php

                 if(isset($_SESSION["username"])) 
                 {

                    if((in_array(1,$_SESSION["role"]) && $_SESSION["isActiv"] ==1 || in_array(2,$_SESSION["role"]) && $_SESSION["isActiv"] ==1 && $_SESSION["isBanned"] ==0) || ($_SESSION["username"] == $_REQUEST["idUsager"]) )  
                    {
                    ?>
                        <span id="info_plus" class="">
                           <div class="form-group row">Username : <?=$data["usager"]->getUsername();?></div> 
                           <div class="form-group row">Adresse : <?=$data["usager"]->getAdresse();?></div> 
                           <div class="form-group row">Téléphone : <?=$data["usager"]->getTelephone();?></div> 
                           <div class="form-group row mb-0">Mode de paiement : <?=isset($data["modePaiement"][0]->modePaiement) ? $data["modePaiement"][0]->modePaiement : "" ?></div> 
                        </span>
                        <?php 
                        if($data["isClient"]) 
                        {
                        ?>  

                        <!-- s'i j'ai des réservations comme client -->
                        <a class="nav-link" href="#" id="reservations">Réservations</a>

                        <?php 
                        }
                    }
                         if($_SESSION["username"] == $_REQUEST["idUsager"]) 
                        {
                        ?>
                         <button type="button" class="btn btn-info mb-2 btn-modifier" data-toggle="modal" data-target="#myModal<?=$_SESSION["username"]?>"  id="ModifierProfil<?=$_SESSION["username"]?>">Modifier le profil</button>
						<?php
                         }

                 }

                        $etatBann = ($data["usager"]->getBanni()=="0") ? 'Bannir' : 'Réhabiliter';
                        $etatActiv = ($data["usager"]->getValideParAdmin()=="0") ? 'Activer' : 'Désactiver';
                        $etatAdmin = ($data["isAdmin"]) ? 'Déchoir' : 'Promouvoir';
						?>
					<span id="info_role" class="form-group row">Rôle : 
						<?php
						foreach($data["usager"]->roles as $role)
						{
						?> 
						   <div class="mr-1"><?=$role->nomRole?></div>

						<?php
						}
						?>
					</span>
					<?php
                    if(!$data["isSuperAdmin"])
                    {
                        if((isset($_SESSION["username"]) && in_array(1,$_SESSION["role"]) && $_SESSION["isActiv"] ==1) || (isset($_SESSION["username"]) && in_array(2,$_SESSION["role"]) && $_SESSION["isActiv"] ==1 && $_SESSION["isBanned"] ==0 && !$data["isAdmin"] && !$data["isSuperAdmin"]))
                        {
                        ?>	  
                            <li class="dropdown nav-item col-md-6" id="div_action_admin">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions Admin
                              </button>
                            </li>
                            <div id="action_admin" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                <li><button class="btn btn-default actionAdmin" name="inversBan" id="<?=$data["usager"]->getUsername()?>"><?=$etatBann?></button></li>
                                <li><button class="btn btn-default actionAdmin" name="inversActiv" id="<?=$data["usager"]->getUsername()?>"><?=$etatActiv?></button> </li>
                                <li><button class="btn btn-default actionAdmin" name="inversAdmin" id="<?=$data["usager"]->getUsername()?>"><?=$etatAdmin?></button> </li>

                            </div>
							
                        <?php
                        }    
                    }
                }
            ?> 