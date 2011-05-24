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
         * @var \DateTime
         */
        private $dateSent;

        /**
         * @var entities\Account
         */
        private $account;

        /**
         * @var entities\Receiver
         */
        private $receiver;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getContent() {
            return $this->content;
        }

        public function setContent($content) {
            $this->content = $content;
        }

        public function getSubject() {
            return $this->subject;
        }

        public function setSubject($subject) {
            $this->subject = $subject;
        }

        public function getRead() {
            return $this->read;
        }

        public function setRead($read) {
            $this->read = $read;
        }

        public function getDateSent() {
            return $this->dateSent;
        }

        public function setDateSent($dateSent) {
            $this->dateSent = $dateSent;
        }

        public function getAccount() {
            return $this->account;
        }

        public function setAccount($account) {
            $this->account = $account;
        }

        public function getReceiver() {
            return $this->receiver;
        }

        public function setReceiver($receiver) {
            $this->receiver = $receiver;
        }
    }
}