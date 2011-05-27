<?php

class PersonDao extends OutletDaoSupport
{
	/**
	 * @param Person $pessoa
	 */
	public function save(Person $pessoa)
	{
		$this->getOutlet()->save($pessoa);
	}
	
	
	/**
	 * @param int $id
	 * @return Person
	 */
	public function getById($id)
	{
		return $this->getOutlet()->load('Person', $id);
	}

}
