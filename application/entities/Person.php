<?php
namespace entities
{
	class Person
	{
		/**
		 * @var int
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var string
		 */
		private $login;
		
		/**
		 * @var entities\Account[]
		 */
		private $accounts;
		/**
	 * @return int $id
	 */
	public function getId() {
		return $this->id;
	}

		/**
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

		/**
	 * @return string $login
	 */
	public function getLogin() {
		return $this->login;
	}

		/**
	 * @return Account[] $accounts
	 */
	public function getAccounts() {
		return $this->accounts;
	}

		/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

		/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

		/**
	 * @param string $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

		/**
	 * @param Account[] $accounts
	 */
	public function setAccounts($accounts) {
		$this->accounts = $accounts;
	}

		
		
	}
}