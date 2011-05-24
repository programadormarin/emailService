<?php
namespace entities
{
	class Pessoa
	{
		/**
		 * @var int
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $nome;
		
		/**
		 * @var string
		 */
		private $apelido;
		
		/**
		 * @var entities\Conta[]
		 */
		private $contas;
		
		/**
		 * @param int $id
		 */
		public function setId($id)
		{
			$this->id = $id;
		}
		
		/**
		 * @param string $nome
		 */
		public function setNome($nome)
		{
			$this->nome = $nome;
		}
		
		/**
		 * @param string $apelido
		 */
		public function setApelido($apelido)
		{
			$this->apelido = $apelido;
		}
		
		/**
		 * @param entities\Conta[]
		 */
		public function setConta(array $contas)
		{
			$$this->contas = $contas;
		}
		
		/**
		 * @return number
		 */
		public function getId()
		{
			return $this->id;
		}
		
		/**
		 * @return string
		 */
		public function getNome()
		{
			return $this->nome;
		}
		
		/**
		 * @return string
		 */
		public function getApelido()
		{
			return $this->apelido;
		}
		
		/**
		 * @return entities\Conta[]
		 */
		public function getConta()
		{
			return $$this->contas;
		}
	}
}