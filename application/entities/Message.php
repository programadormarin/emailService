<?php
namespace entities
{
    class Message
    {
        /**
         * @var int
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