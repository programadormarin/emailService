<?php

class EmailServiceActionController implements AppAction
{
	/**
	 * @param  AppRequest $request
	 * @see AppAction::process()
	 */
	public function process(AppRequest $request)
	{
		$component = $this->render($request);
		echo $component;
	}

	/**
	 * @param AppRequest $request
	 * @return UIComponent|string
	 */
	protected function render(AppRequest $request)
	{
		if ($action = $this->getAction($request)) {
			return $action->process($request);
		}

		throw new AppActionNotFoundException('Ação não encontrada: "' . $request->getUriSegment(1) . '"');
	}

	/**
	 * @param AppRequest $request
	 * @return AppAction
	 */
	protected function getAction(AppRequest $request)
	{
		switch ($request->getUriSegment(1)) {
			case 'message':
				$server = new SoapServer(__DIR__ . '../webservices/wsdl/EmailService.wsdl');
				$server->setClass('EmailServiceMessageController');
				$server->handle();
				break;
			default:
				if ($request->getHttpMethod() === 'POST'){
					$this->cadastra($request);
					return new EmailServiceCadastroView();
				} else {
					return new EmailServiceCadastroView();
				}
				break;
		}
	}
	
	/**
	 * @param AppRequest $request
	 * @return Ambigous Person
	 */
	protected function salvaPessoa(AppRequest $request)
	{
			$post = $request->getVars();
			$pessoa = New Person();
			$daoPessoa = new PersonDao();
			
			$pessoa->setLogin($post['apelido']);
			$pessoa->setName($post['nome']);
			return $daoPessoa->save($pessoa);
	}
	
	/**
	 * @param AppRequest $request
	 * @return Account
	 */
	protected function salvaConta(AppRequest $request) {
			$post = $request->getVars();
			$daoConta = new AccountDao();
			
			$conta =  new Account();
			
			$conta->setPerson($this->salvaPessoa($request));
			$conta->setEmail($post['email']);
			$conta->setHost($post['host']);
			$conta->setPort($post['porta']);
			$conta->setPass($post['senha']);
			$conta->setSecret($this->geraSecret($conta->getPerson()->getLogin()));
			
			return $daoConta->save($conta);
	}
	
	protected function cadastra(AppRequest $request)
	{
			$conta = $this->salvaConta($request);
			return new EmailServiceCadastroView();
	}
	
	/**
	 * @param unknown_type $login
	 * @param unknown_type $salt
	 * @return string
	 */
	protected function geraSecret($login, $salt = null)
	{
		if (is_null($salt)) $salt = uniqid();
		
		$hash = $salt;
		
		for ($i = 0; $i < 1000; ++$i) $hash = md5($hash . $login);
		
		return $hash . $salt;
	}
}