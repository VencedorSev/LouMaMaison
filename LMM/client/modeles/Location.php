<?php
/**
* @file 		/Location.php
* @brief 		Projet WEB 2
* @details								
* @author       Bourihane Salim, Massicotte Natasha, Mercier Renaud, Romodina Yuliya - 15612
* @version      v.1 | fevrier 2018 	
*/

	/**
    * @class    Location 
    * @details  Instancie un object de type Location
    *
    *   1 constructeur  |   getters & setters
    */
	class Location
	{
		//attributs privés
		private $id;
		private $dateDebut;
		private $dateFin;
		private $valideParPrestataire;
		private $validePaiement;
		private $id_appartement;
		private $id_userClient;
		private $nbPersonnes;
		private $refuse;
        private $idDispo;
		
		/**
        *   constructeur de la classe Location
        *       
        *   @param <int>           	$id                     l'id de la location 
        *   @param <date>           $dateDebut              date de debut de la location     
        *   @param <date>        	$dateFin            	date de debut de la location   
        *   @param <tinyint>        $valideParPrestataire   bool si valide par Proprio 
        *   @param <tinyint>        $validePaiement         bool si paiement valide  
        *   @param <int>        	$idAppartement          l'id de l'appartement  
        *   @param <string>        	$idUserClient           l'id de l'utilisateur    
        *   @param <int>        	$nbPersonnes            le nombre de personnes pour la location    
        *   @param <tinyint>        $refuse            		statut de demande    
        *   @param <int>        	$idDispo            	id de la disponibilite     
        */
		public function __construct($id = 0, $dateDebut = "", $dateFin = "", $valideParPrestataire =0, $validePaiement = 0, $id_appartement = "", $id_userClient = "", $nbPersonnes="", $refuse = 0, $idDispo = "")
		{
			$this->setId($id);
			$this->setDateDebut($dateDebut);
			$this->setDateFin($dateFin);
			$this->setValideParPrestataire($valideParPrestataire);
			$this->setValidePaiement($validePaiement);
			$this->setIdAppartement($id_appartement);
			$this->setIdUserClient($id_userClient);
			$this->setNbPersonnes($nbPersonnes);
			$this->setRefuse($refuse); 
            $this->setIdDispo($idDispo);
		}
		
		//getters 
		public function getId()
		{
			return $this->id;
		}
		
		public function getDateDebut()
		{
			return $this->dateDebut;
		}
		
		public function getDateFin()
		{
			return $this->dateFin;
		}
		
		public function getValideParPrestataire()
		{
			return $this->valideParPrestataire;
		}
		
		public function getValidePaiement()
		{
			return $this->validePaiement;
		}
		
		public function getIdAppartement()
		{
			return $this->id_appartement;
		}
		
		public function getIdUserClient()
		{
			return $this->id_userClient;
		}
		
		public function getNbPersonnes()
		{
			return $this->nbPersonnes;
		}
		
		public function getRefuse() 
		{
			return $this->refuse;
		}
       
        public function getIdDispo() 
		{
			return $this->idDispo;
		}
        
		//setters
		public function setId($id)
		{
			if(is_int(intval($id))) {
				$this->id = $id;
			}
			else
				return false;
		}
		
		public function setDateDebut($dateDebut) //YYYY-MM-DD
		{
			$this->dateDebut = $dateDebut;
		}
		
		public function setDateFin($dateFin) 
		{
			$this->dateFin = $dateFin;
		}
		
		public function setValideParPrestataire($valideParPrestataire)
		{
			$this->valideParPrestataire = $valideParPrestataire;
		}
		
		public function setValidePaiement($validePaiement)
		{
			$this->validePaiement = $validePaiement;
		}
		
		public function setIdAppartement($idAppartement)
		{
			$this->id_appartement = $idAppartement;
		}
		
		public function setIdUserClient($id_userClient)
		{
			$this->id_userClient = $id_userClient;
		}
		
		public function setNbPersonnes($nbPersonnes)
		{
			$this->nbPersonnes = $nbPersonnes;
		}

		public function setRefuse($refuse)
		{
			$this->refuse = $refuse;
		}
         
        public function setIdDispo($idDispo)
		{
			$this->idDispo = $idDispo;
		}
             
	}
?>