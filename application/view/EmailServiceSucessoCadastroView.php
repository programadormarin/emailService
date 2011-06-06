<?php

class EmailServiceSucessoCadastroView extends UIComponent 
{
	/**
	 * @param AppRequest $request
	 * @return EmailServiceCadastroView
	 */
	public function process(AppRequest $request)
	{
		return new EmailServiceSucessoCadastroView();
	}
}