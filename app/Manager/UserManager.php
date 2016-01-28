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

}

	