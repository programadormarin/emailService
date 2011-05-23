<?php
namespace entities
{
	class Receiver
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
		private $email;
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
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
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
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	}
}