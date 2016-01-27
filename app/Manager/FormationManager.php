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
}