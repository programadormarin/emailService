<?php
class AccountDao extends OutletDaoSupport
{
	/**
	 * @param Account $account
	 * @return Account
	 */
	public function save(Account $account)
	{
		return $this->getOutlet()->save($account);	
	}
	
	/**
	 * @return Account
	 */
	public function getById()
	{
		return $this->getOutlet()->load('Account', $id);
	}
	
	/**
	 * @param string $secret
	 * @return Account
	 */
	public function getBySecret($secret)
	{
		return $this->getOutlet()->from('Account')
								 ->where('secret = ?', array($secret))
								 ->findOne();
	}
}