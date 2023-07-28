<?php

namespace Ecommerce;

require_once("vendor/autoload.php");

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

class Mailer
{

	private $mail;

	function __construct($toAddress, $toName, $subject, $tamplate, $tamplateDara = [])
	{


		//Classe 'PHPMailer' está no escopo pricipal, necessário usa da '\'
		$this->mail = new PHPMailer(true); 


		$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$this->mail->isSMTP();
		$this->mail->Host       = 'smtp.office365.com';
		$this->mail->SMTPAuth   = true;
		$this->mail->Username   = 'alercioborges@hotmail.com';
		$this->mail->Password   = 'Aecolrims@89';
		$this->mail->SMTPSecure = 'tls';
		$this->mail->Port       = 587;

		$this->mail->setFrom('alercioborges@hotmail.com', 'Ecommerce Aplication');
		$this->mail->addAddress($toAddress, $toName);
		$this->mail->addReplyTo('no-reply@ecommerce.com', 'Ecommerce Aplication');

		$this->mail->isHTML(true);
		$this->mail->Subject = $subject;
		$this->mail->Body    = "<h1>Body</h1>";
		$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';		
	}

	public function send()
	{		
		try{
			return $this->mail->send();			

		} catch (\Exception $e) {
			return "Erro ao enviar mensagem: {$this->mail->ErrorInfo}";
			
		}		
	}
}

?>