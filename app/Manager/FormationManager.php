<?php

namespace Manager;


class FormationManager extends \W\Manager\Manager
{


	public function lastInsertFormation() {

		$sql = "SELECT MAX(id) as id FROM " . $this->table ;
		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetch();		
	}

	// Fonction qui compte le nombre de formations proposées pour affichage sur la page d'accueil
	public function countFormations() {

		$sql = "SELECT COUNT(*) as nbrFormation FROM " . $this->table ;
		$sql .= " WHERE dateFormation >= now() ; " ;

		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetch();	
	}


	// Fonction liste de toutes les formations à venir 

	public function listFormations() {
		$sql = "SELECT * FROM " . $this->table;
		$sql .= " WHERE dateFormation >= now() ";
		$sql .= "ORDER BY dateFormation ASC  LIMIT 30 ;" ;

		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetchAll();	
	}

	// Fonction liste des formations d'un user 

	public function listFormationsByUser($userId) {


		// recherche des utilisateur 
		$sql = "SELECT * FROM " . $this->table;
		$sql .= " WHERE userId = :userId ";
		$sql .= "ORDER BY dateFormation ASC LIMIT 5 ;" ;

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":userId", $userId);

		$sth->execute();
		return $sth->fetchAll();		
	}
}