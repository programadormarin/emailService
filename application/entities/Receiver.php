<?php
/**
 * @author Hermenegildo Marin Júnior <programador.marin@gmail.com>
 * @Entity
 * @Table(name="destinatario")
 */
class Receiver
{
	/**
	 * @var int
	 * @Column(type="integer", name="id")
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
	 * @Column(length=150, name="email")
	 */
	private $email;

	/**
	 * @var String
	 * @ManyToOne(targetEntity="Message", inversedBy="receiver")
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