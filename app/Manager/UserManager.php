<?php

namespace Manager;


class UserManager extends \W\Manager\UserManager
{

	public function lastInsertUser() {

		$sql = "SELECT MAX(id) as id FROM " . $this->table ;
		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetch();		
	}


	public function manageKikos($userId , $action)
	{
		// ajoute ou supprime un kiko à une utilisateur 
		$val = array('del' , 'add');	
		if (! in_array($action, $val) ) {
			return false;
		}

		$sql = "UPDATE " . $this->table . " SET ";
		if ( $action == 'add') {
			$sql .= "credit =  credit + 1 ";
		} else {
			$sql .= "credit =  credit - 1 ";	
		}
		
		$sql .= "WHERE id = :userId;";

		$sth = $this->dbh->prepare($sql);

		$sth->bindValue(":userId", $userId);

		$result = $sth->execute();
		return $result;
	}

	// fonction qui retourne le nombre de kikologues inscrits 
	public function countKikologue()
	{
		$sql = "SELECT count(*) as nbrKikologue FROM " .$this->table ;

		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetch();
	}
}

	