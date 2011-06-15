<?php

class EmailServiceMessageController
{
	public function __construct(AppRequest $request) {
		throw new SoapFault("Client Sei lah.");
		$vars = $request->getVars();
		switch ($request->getUriSegment(1)) {
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
			return $message->getId();
		} catch (Exception $e) {
			throw new SoapFault("Não foi possível salvar e enviar a mensagem: " . $e->getMessage() . '<pre>' . $e->getTraceAsString());
		}
	}

	/* (non-PHPdoc)
	 * @see EmailServiceMessageService::getById()
	 */
	public function getById($chave, $id) {
		throw new SoapFault('dfsdfsdf');
		$conta = $this->verificaChave($chave);
		$messageDao = new MessageDao();
		
		try {
			return $this->toMessageDto($messageDao->getById($id));
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
			$mensagens = $messageDao->getByDateInterval(new DateTime($dataInicial), new DateTime($dataFinal));
			$messageDtos = array();
			
			foreach ($mensagens as $mensagem) {
				$messageDtos[] = $this->toMessageDto($mensagem);
			}
			
			return $messageDtos;
			
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
		$mail = new PHPMailer(true);
	
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
		
		$mail->Send();
	}

	protected function toMessageDto(Message $message)
	{
		$messageDto = new MessageDto();
		
		$messageDto->id = $message->getId();
		$messageDto->emailDestinatario = $message->getReceiver()->getEmail();
		$messageDto->nomeDestinatario = $message->getReceiver()->getName();
		$messageDto->emailRemetente = $message->getAccount()->getEmail();
		$messageDto->nomeRemetente = $message->getAccount()->getPerson()->getName();
		$messageDto->assunto = $message->getSubject();
		$messageDto->conteudo = $message->getContent();
		$messageDto->dataEnvio = $message->getDateSent()->format('Y-m-d');
		
		return $messageDto;
	}
}
