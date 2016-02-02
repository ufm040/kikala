<?php

namespace Manager;


class InscriptionManager extends \W\Manager\Manager
{

	public function checkInscription($formationId, $userId) {
 
		if (!is_numeric($formationId)){
			return false;
		}
		if (!is_numeric($userId)){
			return false;
		}		

		$sql = "SELECT * FROM " . $this->table . " WHERE  formationId = :formationId AND userId = :userId ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":formationId", $formationId);
		$sth->bindValue(":userId", $userId);
		$sth->execute();
		$foundInscription = $sth->fetch();
		if ($foundInscription){
			return true;
		}

		return false;	
	}

	public function cancelInscription($formationId, $userId) {

		if (!is_numeric($formationId)){
			return false;
		}
		if (!is_numeric($userId)){
			return false;
		}

		$sql = "DELETE FROM " . $this->table . " WHERE  formationId = :formationId AND userId = :userId ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":formationId", $formationId);
		$sth->bindValue(":userId", $userId);
		$sth->execute();		
		return $sth->execute();

	}

	public function countInscription($formationId)
	{
		$sql = "SELECT count(*) as nbrInscrit FROM ". $this->table . " WHERE formationId = :formationId";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":formationId", $formationId);

		$sth->execute();
		return $sth->fetch()['nbrInscrit'];	
	}

	/**
	 * Récupère la liste des formations auxquel un utilisateur a été inscrit
	 * @param  integer user Id
	 * @return mixed Les formations
	 */
	public function listInscriptions($userId,$iter)
	{
		if (!is_numeric($userId)){
			return false;
		}

		$records_per_page = 5;
		$starting_position=0;
		if ($iter > 1) {
			$starting_position=($iter-1) * $records_per_page;		
		}

		$sql = "SELECT * FROM " . $this->table . " WHERE  userId= :userId LIMIT $starting_position , $records_per_page";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":userId", $userId);
		$sth->execute();

		return $sth->fetchAll();
	}	

}