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
         * @return strint
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

        /**
         * @return string
         */
        public function getHost() {
            return $this->host;
        }

        /**
         * @param string $host
         */
        public function setHost($host) {
            $this->host = $host;
        }

        /**
         * @return number
         */
        public function getPort() {
            return $this->port;
        }

        /**
         * @param int $port
         */
        public function setPort($port) {
            $this->port = $port;
        }

        /**
         * @return string
         */
        public function getPass() {
            return $this->pass;
        }

        /**
         * @param string $pass
         */
        public function setPass($pass) {
            $this->pass = $pass;
        }

        /**
         * @return string
         */
        public function getSecret() {
            return $this->secret;
        }

        /**
         * @param string $secret
         */
        public function setSecret($secret) {
            $this->secret = $secret;
        }
    }
}