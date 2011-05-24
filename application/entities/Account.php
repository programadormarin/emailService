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
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getHost() {
            return $this->host;
        }

        public function setHost($host) {
            $this->host = $host;
        }

        public function getPort() {
            return $this->port;
        }

        public function setPort($port) {
            $this->port = $port;
        }

        public function getPass() {
            return $this->pass;
        }

        public function setPass($pass) {
            $this->pass = $pass;
        }

        public function getSecret() {
            return $this->secret;
        }

        public function setSecret($secret) {
            $this->secret = $secret;
        }
    }
}