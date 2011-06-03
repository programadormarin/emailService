<?php

class EmailServiceAdmActionController implements AppAction
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
			case 'cadastro':
				return new EmailServiceCadastroView();
		}
	}
}