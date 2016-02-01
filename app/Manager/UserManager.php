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
		$val = array('del' , 'ins');	
		if (! in_array($action, $val) ) {
			return false;
		}

		$sql = "UPDATE " . $this->table . " SET ";
		$sql .= "credit =  credit + 1";
		$sql .= "WHERE userId = :userId";

		$sth = $this->dbh->prepare($sql);

		$sth->bindValue(":userId", $userId);
		return $sth->execute();
	}
}

	