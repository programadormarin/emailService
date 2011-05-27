<?php
class Person_OutletProxy extends Person implements OutletProxy
{
	public function getaccounts()
	{
		$args = func_get_args();

		if (count($args)) {
			if (is_null($args[0])) {
				return parent::getaccounts();
			}

			$q = $args[0];
		} else {
			$q = '';
		}

		if (isset($args[1])) {
			$params = $args[1];
		} else {
			$params = array();
		}

		$q = trim($q);

		if (stripos($q, 'where') !== false) {
			$q = '{Account.personId} = ' . $this->getId() . ' AND ' . substr($q, 5);
		} else {
			$q = '{Account.personId} = ' . $this->getId() . ' ' . $q;
		}

		$query = Outlet::getInstance()->from('Account')->where($q, $params);
		$cur_coll = parent::getaccounts();

		if (!$cur_coll instanceof OutletCollection || $cur_coll->getQuery()->toSql() != $query->toSql()) {
			parent::setaccounts(new OutletCollection($query));
		}

		return parent::getaccounts();
	}
}

