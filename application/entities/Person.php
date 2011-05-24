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
        private $name;

        /**
         * @var string
         */
        private $login;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
        }
    }
}