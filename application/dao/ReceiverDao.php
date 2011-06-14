<?php
class ReceiverDao extends OutletDaoSupport
{
	/**
	 * @param Receiver $receiver
	 * @return Receiver
	 */
	public function save(Receiver $receiver)
	{
		$this->getOutlet()->save($receiver);
		return $receiver;
	}
	
	/**
	 * @param int $id
	 * @return Ambigous <object, multitype:, NULL, OutletProxy>
	 */
	public function getById($id)
	{
		return $this->getOutlet()->load('Receiver', $id);	
	}
	
	/**
	 * @param string $email
	 * @return Receiver
	 */
	public function getByEmail($email)
	{
		return $this->getOutlet()->from('Receiver')
								 ->where('email LIKE ?', array($email))
								 ->find();
	}
}