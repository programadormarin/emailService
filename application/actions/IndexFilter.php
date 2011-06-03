<?php

require_once ('application/br.com.lcobucci.action-mapper/filter/AppFilter.php');

/** 
 * @author HErmene
 * 
 * 
 */
class IndexFilter implements AppFilter {
	
	/**
	 * 
	 * @param  AppRequest $request
	  
	 * @see AppFilter::applyFilter()
	 */
	public function applyFilter(AppRequest $request) {
		$request->setUri('adm/' . $request->getUri());
	}
}

?>