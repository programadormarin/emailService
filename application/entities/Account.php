<?php
namespace entities
{
	class Account
	{
		/**
		 * @var int
		 */
		private $id;
		
		/**
		 * @var strint
		 */
		private $email;
		
		/**
		 * @var string
		 */
		private $host;
		
		/**
		 * @var int
		 */
		private $port;
		
		/**
		 * @var string
		 */
		private $pass;
		
		/**
		 * @var string
		 */
		private $secret;
		/**
		 * @return int $id
		 */
		public function getId() {
			return $this->id;
		}
	
		/**
		 * @return strint $email
		 */
		public function getEmail() {
			return $this->email;
		}
	
		/**
		 * @return string $host
		 */
		public function getHost() {
			return $this->host;
		}
	
		/**
		 * @return int $port
		 */
		public function getPort() {
			return $this->port;
		}
	
		/**
		 * @return string $pass
		 */
		public function getPass() {
			return $this->pass;
		}
	
		/**
		 * @return string $secret
		 */
		public function getSecret() {
			return $this->secret;
		}
	
		/**
		 * @param int $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
		/**
		 * @param strint $email
		 */
		public function setEmail($email) {
			$this->email = $email;
		}
	
		/**
		 * @param string $host
		 */
		public function setHost($host) {
			$this->host = $host;
		}
	
		/**
		 * @param int $port
		 */
		public function setPort($port) {
			$this->port = $port;
		}
	
		/**
		 * @param string $pass
		 */
		public function setPass($pass) {
			$this->pass = $pass;
		}
	
		/**
		 * @param string $secret
		 */
		public function setSecret($secret) {
			$this->secret = $secret;
		}
	}
}