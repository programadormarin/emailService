<?php
require_once 'Dao.php';

class MessageDao extends OutletDaoSupport 
{
	public function save(Message $message)
	{
		return $this->getOutlet()->save($message);
	}
	
	public function getById($id)
	{
		return $this->getOutlet()->load('Message', $id);
	}
	
	/**
	 * @param DateTime $dataIni
	 * @param DateTime $dataFim
	 * @return Message[]
	 */
	public function getByDateInterval(DateTime $dataIni, DateTime $dataFim)
	{
		return $this->getOutlet()->from('Message')
								 ->where('dataEnvio BETWEEN ? AND ?', array($dataIni->format('Y-m-d'), $dataFim->format('Y-m-d')))
								 ->find();
	}
}