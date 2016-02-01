<?php

namespace Manager;


class InscriptionsManager extends \W\Manager\Manager
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

}