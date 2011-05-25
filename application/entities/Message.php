<?php
namespace entities
{
	/**
	 * @author Hermenegildo Marin Júnior <programador.marin@gmail.com>
	 * @Entity
	 * @Table(name="mensagem")
	 */
    class Message
    {
        /**
         * @var int
         * @Column(type="integer", name="id")
         * @GeneratedValue
         */
        private $id;

        /**
         * @var string
         * @Column(length=255, name="conteudo")
         */
        private $content;

        /**
         * @var string
         * @Column(length=100, name="assunto")
         */
        private $subject;

        /**
         * @var boolean
         * @Column(type="boolean", name="lida")
         */
        private $read;

        /**
         * @var \DateTime
         * @Column(name="data_envio", type="date")
         */
        private $dateSent;

        /**
         * @var entities\Account
         * @ManyToOne(targetEntity="Account", inversedBy="message")
         */
        private $account;

        /**
         * @var entities\Receiver
         * @ManyToOne(targetEntity="Receiver", inversedBy="message")
         */
        private $receiver;

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
        public function getContent() {
            return $this->content;
        }

        /**
         * @param string $content
         */
        public function setContent($content) {
            $this->content = $content;
        }

        /**
         * @return string
         */
        public function getSubject() {
            return $this->subject;
        }

        /**
         * @param string $subject
         */
        public function setSubject($subject) {
            $this->subject = $subject;
        }

        /**
         * @return boolean
         */
        public function getRead() {
            return $this->read;
        }

        /**
         * @param string $read
         */
        public function setRead($read) {
            $this->read = $read;
        }

        /**
         * @return DateTime
         */
        public function getDateSent() {
            return $this->dateSent;
        }

        /**
         * @param DateTime $dateSent
         */
        public function setDateSent(DateTime $dateSent) {
            $this->dateSent = $dateSent;
        }

        /**
         * @return \entities\Account
         */
        public function getAccount() {
            return $this->account;
        }

        /**
         * @param Account $account
         */
        public function setAccount(Account $account) {
            $this->account = $account;
        }

        /**
         * @return \entities\Receiver
         */
        public function getReceiver() {
            return $this->receiver;
        }

        /**
         * @param Receiver $receiver
         */
        public function setReceiver(Receiver $receiver) {
            $this->receiver = $receiver;
        }
    }
}