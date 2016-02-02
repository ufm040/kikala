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

	public function listFormations($userId,$iter) {

		$records_per_page = 5;
		$starting_position=0;
		if ($iter > 1) {
			$starting_position=($iter-1) * $records_per_page;		
		}

		$sql = "SELECT * FROM " . $this->table;
		if (  !$userId ) {
			$sql .= " WHERE dateFormation >= now()";	
		} else {
			$sql .= " WHERE userId = :userId ";	
		}
		
		$sql .= "ORDER BY dateFormation ASC LIMIT $starting_position , $records_per_page  ;" ;

		$sth = $this->dbh->prepare($sql);

		if ($userId) {
			$sth->bindValue(":userId", $userId);	
		}

		$sth->execute();
		return $sth->fetchAll();	
	}

	// Fonction qui récupére les formations après une date 
	public function listFormationsToCredit(){

		$sql = "SELECT id  as formationId, userId  FROM " . $this->table;

		$sql .= " WHERE topCredit = 0 and dateFormation < now()";

		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetchAll();	

	}

}