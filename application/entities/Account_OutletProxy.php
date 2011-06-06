<?php
class Account_OutletProxy extends Account implements OutletProxy
{
	public function getperson()
	{
		if (is_null($this->personId)) {
			return parent::getperson();
		}

		if (is_null(parent::getperson())) {
			parent::setperson(Outlet::getInstance()->load('Person', $this->personId));
		}

		return parent::getperson();
	}

	public function setperson(Person $ref)
	{
		if (is_null($ref)) {
			throw new OutletException('You can not set this to NULL since this relationship has not been marked as optional');
		}

		$this->personId = $ref->getId();

		return parent::setperson($ref);

	}
}

