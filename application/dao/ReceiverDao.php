<?php
class ReceiverDao extends OutletDaoSupport
{
	public function save(Receiver $receiver)
	{
		$this->getOutlet()->save($receiver);
	}
	
	public function getById($id)
	{
		return $this->getOutlet()->load('Receiver', $id);	
	}
	
	public function getByEmail($email)
	{
		return $this->getOutlet()->from('Receiver')
								 ->where('email LIKE ?', array($email))
								 ->find();
	}
}