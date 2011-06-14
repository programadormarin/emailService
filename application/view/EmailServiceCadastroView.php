<?php

class EmailServiceCadastroView extends UIComponent 
{
	protected $mensagem;
	
	/**
	 * @param AppRequest $request
	 * @return EmailServiceCadastroView
	 */
	public function process(AppRequest $request)
	{
		return new EmailServiceCadastroView();
	}
	
	public function setMensagem($mensagem)
	{
		$this->mensagem = $mensagem;
	}
	
	public function getMensagem()
	{
		return $this->mensagem;
	}
}