<?php
namespace entities
{
	/**
	 * @author Hermenegildo Marin Júnior <programador.marin@gmail.com>
	 * @Entity
	 * @Table (name=pessoa)
	 */
    class Person
    {
        /**
         * @var int
         * @Column(type="integer")
         * @GeneratedValue
         */
        private $id;

        /**
         * @var string
         * @Column(length=255, name="nome")
         */
        private $name;

        /**
         * @var string
         * @Column(length=50, name="apelido")
         */
        private $login;
        
        /**
         * @var entities\Account[]
         * @OneToMany(targetEntity="Account", mappedBy="person")
         */
        private $accounts;

        /**
         * @return number
         */
        public function getId() {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId($id) {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getName() {
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName($name) {
            $this->name = $name;
        }

        /**
         * @return string
         */
        public function getLogin() {
            return $this->login;
        }

        /**
         * @param string $login
         */
        public function setLogin($login) {
            $this->login = $login;
        }
    }
}