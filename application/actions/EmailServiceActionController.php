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

		throw new AppActionNotFoundException('Ação não encontrada');
	}

	/**
	 * @param AppRequest $request
	 * @return AppAction
	 */
	protected function getAction(AppRequest $request)
	{
		switch ($request->getUriSegment(1)) {
			case 'message':
				return new EmailServiceMessageView();
			default:
				if ($request->getHttpMethod() === 'POST'){
					$this->cadastra($request);
				}else {
					return new EmailServiceCadastroView();
				}
		}
	}
	

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
			$conta->setSecret($this->geraSecret($conta->getPerson()->getLogin(), $conta->getPass()));
			
			return $daoConta->save($conta);
	}
	
	protected function cadastra(AppRequest $request)
	{
			$conta = $this->salvaConta($request);
			return new EmailServiceSucessoCadastroView();
	}
	
	protected function geraSecret($login, $senha, $hash = null)
	{
		if (!$hash) {
			$prefixo = uniqid(time());
		}
		
		for ($i = 0; $i < 1000; $i++) {
			$hash = md5($login . $senha);
		}
		return $hash . $hash;
	}
}