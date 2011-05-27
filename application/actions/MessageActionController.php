<?php
class MessageActionController implements AppAction
{
	/**
	 * @param  AppRequest $request
	 * @see AppAction::process()
	 */
	public function process(AppRequest $request)
	{
		return new MainActionController();
	}
	
	/**
	 * @param string $chave
	 * @param int $id
	 * @return MessageDto
	 */
	public function getById($chave, $id)
	{
		$this->validaAcesso($chave);
		return $this->getMessageDao()->getById($id);
	}
	
	/**
	 * @param string $chave
	 * @param string $assunto
	 * @param string $conteudo
	 * @param string $email
	 * @param string $nome
	 * @return int
	 */
	public function envia($chave, $assunto, $conteudo, $email, $nome = null)
	{
		$this->validaAcesso($chave);
		
	}
	
	protected function setReceiver($email, $nome = null)
	{
		if (!$this->getReceiverDao()->getByEmail($email)){
			$receiver = new Receiver();
			$receiver->setEmail($email);
			$receiver->setName($nome);
			$receiver = $this->getReceiverDao()->save($receiver);
		}
		
		return true;
	}
	
	/**
	 * @param string $chave
	 * @param date $dataIni
	 * @param date $dataFim
	 */
	public function listaMensagem($chave, $dataIni, $dataFim)
	{
		$this->validaAcesso($chave);
		$messages = $this->getMessageDao()->getByDateInterval(new DateTime($dataIni), new DateTime($dataFim));
		return $this->toMessageDtoList($messages);
	}
	
	/**
	 * @param array $messages
	 * @return MessageDto[]
	 */
	protected function toMessageDtoList(array $messages)
	{
		$messagesDto = array();
		
		foreach ($messages as $message) {
			$messagesDto = $this->toMessageDto($message);
		}
		
		return $messagesDto;
	}
	
	/**
	 * @param string $chave
	 * @throws SoapFault
	 * @return Account
	 */
	protected function validaAcesso($chave)
	{
		try {
			return $this->getAccountDao()->getBySecret($chave);
		} catch (OutletSelectQuery $e) {
			throw new SoapFault('Chave passada não existe.');
		}
	}
	
	/**
	 * @param Message $message
	 * @return MessageDto
	 */
	protected function toMessageDto(Message $message)
	{
		$obj = new MessageDto();
		$obj->id = $message->getId();
		$obj->emailDestinatario = $message->getReceiver()->getEmail();
		$obj->nomeDestinatario = $message->getReceiver()->getName();
		$obj->emailRemetente = $message->getAccount()->getEmail();
		$obj->nomeRemetente = $message->getAccount()->getPerson()->getName();
		$obj->assunto = $message->getSubject();
		$obj->dataEnvio = $message->getDateSent();
		
		return $obj;
	}

	/**
	 * @return AccountDao
	 */
	protected function getAccountDao()
	{
		return new AccountDao();
	}
	
	/**
	 * @return ReceiverDao
	 */
	protected function getReceiverDao()
	{
		return new ReceiverDao();
	}
	
	/**
	 * @return MessageDao
	 */
	protected function getMessageDao()
	{
		return new MessageDao();
	}
}