<?php
interface EmailServiceMessageInterface
{
	/**
	 * Envia uma nova mensagem
	 * 
	 * @param string $chaveAutenticacao Chave de autenticação da conta
	 * @param string $assunto Assunto da mensagem
	 * @param string $conteudo Conteúdo da mensagem
	 * @param string $emailDestinatario Email do destinatário
	 * @param string $nomeDestinatario Nome do destinatário (opcional)
	 * @return int
	 */
	public function send($chaveAutenticacao, $assunto, $conteudo, $emailDestinatario, $nomeDestinatario = null);
	
	/**
	 * Busca a mensagem pelo ID
	 * 
	 * @param string $chaveAutenticacao Chave de autenticação da conta
	 * @param int $id ID da mensagem
	 * @return MensagemDto
	 */
	public function getById($chaveAutenticacao, $id);
	
	/**
	 * Retorna as mensagens enviadas no período passado
	 * 
	 * @param string $chaveAutenticacao Chave de autenticação da conta
	 * @param string $dataInicial Data inicial no formato AAAA-MM-DD
	 * @param string $dataFinal Data final no formato AAAA-MM-DD
	 * @return MensagemDto[]
	 */
	public function listAll($chaveAutenticacao, $dataInicial, $dataFinal);
}