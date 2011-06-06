<?php

class PersonDao extends OutletDaoSupport
{
	/**
	 * @param Person $pessoa
	 */
	public function save(Person $pessoa)
	{
		 $this->getOutlet()->save($pessoa);
		 return $this->getByLogin($pessoa->getLogin()); 
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
	 * @return Person
	 */
	protected function getByLogin($login)
	{
		return $this->getOutlet()->selectOne('Person', 'apelido = ?', array($login));
	}

}
