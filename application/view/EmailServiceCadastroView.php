<?php

class EmailServiceCadastroView extends UIComponent 
{
	/**
	 * @param AppRequest $request
	 * @return EmailServiceCadastroView
	 */
	public function process(AppRequest $request)
	{
		return new EmailServiceCadastroView();
	}
}