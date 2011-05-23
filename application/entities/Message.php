<?php
namespace entities
{
	class Message
	{
		/**
		 * @var int
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $content;
		
		/**
		 * @var string
		 */
		private $subject;
		
		/**
		 * @var boolean
		 */
		private $read;
		
		
		/**
		 * @var entities\Conta
		 */
		private $dateSent;
		
		/**
		 * @var entities\Destinatario
		 */
		private $destinatario;
		
		/**
		 * @return int $id
		 */
		public function getId() {
			return $this->id;
		}
	
		/**
		 * @return string $content
		 */
		public function getContent() {
			return $this->content;
		}
	
		/**
		 * @return string $subject
		 */
		public function getSubject() {
			return $this->subject;
		}
	
		/**
		 * @return boolean $read
		 */
		public function getRead() {
			return $this->read;
		}
	
		/**
		 * @return Conta $dateSent
		 */
		public function getDateSent() {
			return $this->dateSent;
		}
	
		/**
		 * @return Destinatario $destinatario
		 */
		public function getDestinatario() {
			return $this->destinatario;
		}
	
		/**
		 * @param int $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
		/**
		 * @param string $content
		 */
		public function setContent($content) {
			$this->content = $content;
		}
	
		/**
		 * @param string $subject
		 */
		public function setSubject($subject) {
			$this->subject = $subject;
		}
	
		/**
		 * @param boolean $read
		 */
		public function setRead($read) {
			$this->read = $read;
		}
	
		/**
		 * @param Conta $dateSent
		 */
		public function setDateSent($dateSent) {
			$this->dateSent = $dateSent;
		}
	
		/**
		 * @param Destinatario $destinatario
		 */
		public function setDestinatario($destinatario) {
			$this->destinatario = $destinatario;
		}
	}
}