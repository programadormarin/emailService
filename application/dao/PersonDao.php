<?php

class PersonDao extends OutletDaoSupport
{
	
	/**
	 * @param Person $pessoa
	 * @return Person
	 */
	public function save(Person $pessoa)
	{
		 $this->getOutlet()->save($pessoa);
		 return $pessoa; 
	}	
	
	/**
	 * @param int $id
	 * @return Person
	 */
	public function getById($id)
	{
		return $this->getOutlet()->load('Person', $id);
	}
	
	
	/**
	 * @param string $login
	 * @return Person[]
	 */
	protected function getByLogin($login)
	{
		return $this->getOutlet()->selectOne('Person', 'apelido = ?', array($login));
	}
}
