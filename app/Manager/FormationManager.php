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
}