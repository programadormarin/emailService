<?php

class EmailServiceMessageController implements EmailServiceMessageService
{
	public function __construct(AppRequest $request) {
		$vars = $request->getVars();
		switch ($request->getUriSegment(2)) {
			case 'send':
				return $this->send($vars['chave'], $vars['assunto'], $vars['conteudo'], $vars['emailDestinatario'], $vars['nomeDestinatario']);
			case 'getById':
				return $this->getById($vars['chave'], $vars['id']);
			case 'listAll':
				return $this->listAll($vars['chave'], $vars['dataInicial'], $vars['dataFinal']);
			default:
				throw new SoapFault("Ação inexistente");
		}
	}
	/* (non-PHPdoc)
	 * @see EmailServiceMessageService::send()
	 */
	public function send($chave, $assunto, $conteudo, $emailDestinatario, $nomeDestinatario = null) {
		$conta = $this->verificaChave($chave);
		$destinatario = $this->pesquisaDestinatário($emailDestinatario, $nomeDestinatario);
		
		$messageDao = new MessageDao();
		
		$message = new Message();
		$message->setAccount($conta);
		$message->setContent($conteudo);
		$message->setSubject($assunto);
		$message->setReceiver($destinatario);
		$message->setRead(FALSE);
		try {
			$messageDao->save($message);
			$this->enviaEmail($message);
		} catch (Exception $e) {
			throw new SoapFault("Não foi possível salvar e enviar a mensagem: " . $e->getMessage() . '<pre>' . $e->getTraceAsString());
		}
	}

	/* (non-PHPdoc)
	 * @see EmailServiceMessageService::getById()
	 */
	public function getById($chave, $id) {
		$conta = $this->verificaChave($chave);
		$messageDao = new MessageDao();
		try {
			return $messageDao->getById($id);
		} catch (Exception $e) {
			throw new SoapFault("Não foi possível encontrar a mensagem: " . $e->getMessage() . '<pre>' . $e->getTraceAsString());
		}
	}

	/* (non-PHPdoc)
	 * @see EmailServiceMessageService::listaMensagens()
	 */
	public function listAll($chave, $dataInicial, $dataFinal) {
		$conta = $this->verificaChave($chave);
		$messageDao = new MessageDao();
		try {
			$messageDao->getByDateInterval(new DateTime($dataInicial), new DateTime($dataFinal));
		} catch (Exception $e) {
			throw new SoapFault("Não foi possível listar mensagens: " . $e->getMessage() . '<pre>' . $e->getTraceAsString());
		}
	}

	/**s
	 * @param string $chave
	 */
	protected function verificaChave($chave)
	{
		$contaDao = new AccountDao();
		if ($conta = $contaDao->getBySecret($chave)) {
			return $conta; 
		} else {
			throw new SoapFault("Chave inexistente!");
		}
	}
	
	protected function pesquisaDestinatário($emailDestinatario, $nomeDestinatario = null)
	{
		$destinatarioDao = new ReceiverDao();
		
		if($destinatario = $destinatarioDao->getByEmail($emailDestinatario)) {
			return $destinatario;
		} else {
			$destinatario = new Receiver();
			$destinatario->setEmail($emailDestinatario);
			$destinatario->setName($nomeDestinatario);
			$destinatarioDao->save($destinatario);
			return $destinatarioDao->getByEmail($emailDestinatario);
		}
	}
	
	/**
	 * @param Message $message
	 * @return EmailServiceSucessoCadastroView
	 */
	protected function enviaEmail(Message $message)
	{
		$mail = new PHPMailer();
	
		$mail->IsSMTP();
		$mail->Host = $message->getAccount()->getHost();
		$mail->Port = $message->getAccount()->getPort();
		$mail->SMTPAuth = true;
		$mail->Username = $message->getAccount()->getEmail();
		$mail->Password = $message->getAccount()->getPass();
		
		$mail->From = $message->getAccount()->getEmail();
		$mail->FromName = $message->getAccount()->getPerson()->getName();
		$mail->AddAddress($message->getReceiver()->getEmail(),$message->getReceiver()->getName());
		$mail->AddReplyTo($message->getAccount()->getEmail(), $message->getAccount()->getPerson()->getName());
		
		$mail->WordWrap = 100;
		
		$mail->IsHTML(true);
		
		$mail->Subject = $message->getSubject();
		$mail->Body = $message->getContent();
		
		return $mail->Send();
	}

}

?>