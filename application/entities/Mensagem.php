<?php
namespace entities
{
	class Mensagem
	{
		/**
		 * @var id
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $conteudo;
		
		/**
		 * @var string
		 */
		private $assunto;
		
		/**
		 * @var boolean
		 */
		private $lida;
		
		
		/**
		 * @var entities\Conta
		 */
		private $conta;
		
		/**
		 * @var entities\Destinatario
		 */
		private $destinatario;
		
		public function setId($id)
		{
			$this->id = $id;
		}
		
		public function setConteudo($conteudo)
		{
			$this->conteudo = $conteudo;
		}
		
		public function setAssunto($assunto)
		{
			$this->assunto = $assunto;
		}
		
		public function setLida($lida)
		{
			$this->lida = $lida;
		}
		
		public function setConta($conta)
		{
			$this->conta = $conta;
		}
		
		public function setDestinatario($destinatario)
		{
			$this->destinatario = $destinatario;
		}
		
	}
}