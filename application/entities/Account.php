<?php
use entities\Person;
namespace entities
{
	/**
	 * @author Hermenegildo Marin Júnior <programador.marin@gmail.com>
	 * @Entity
	 * @Table(name="conta")
	 */
    class Account
    {
        /**
         * @var int
         * @Column(type="integer", name="id")
         * @GeneratedValue
         */
        private $id;

        /**
         * @var strint
         * @Column(length=100, name="email")
         */
        private $email;

        /**
         * @var string
         * 
         * @Column(length=100, name="host")
         */
        private $host;

        /**
         * @var int
         * @Column(type="integer", name="porta")
         */
        private $port;

        /**
         * @var string
         * @Column(type="integer", name="senha")
         */
        private $pass;

        /**
         * @var string
         * @Column(length=32, name="chave")
         */
        private $secret;
        
        /**
         * @var entities\Person
         * @ManyToOne(targetEntity="Person", inversedBy="accounts")
         */
        private $person;
        
        /**
         * @var entities\Person
         * @OneToMany(targetEntity="Message", mappedBy="account")
         */
        private $messages;
        
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