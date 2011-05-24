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
         * Enter description here ...
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
        public function getEmail() {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail($email) {
            $this->email = $email;
        }
    }
}