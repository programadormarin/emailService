<?php
namespace dao
{
	
	use entities\Person;

	class PersonDao
	{
		public function save(Person $person)
		{
			$person->name = "seilá";
			
		}
	}
}