<?php

namespace Ecommerce;

require_once("vendor/autoload.php");

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;
use \Ecommerce\Controller\TemplatePage;

class Mailer
{

	private $mail;

	function __construct($toAddress, $toName, $subject, $pathLayout, $fileLayout, $layoutDara = [], $layoutImage = [])
	{

		$loader = new \Twig\Loader\FilesystemLoader($pathLayout);
		$twig = new \Twig\Environment($loader, [
			'cache' => false,
			'debug' => false
		]);

		$layout_email = $twig->render($fileLayout, $layoutDara);


		//Classe 'PHPMailer' está no escopo pricipal, necessário usa da '\'
		$this->mail = new PHPMailer(true); 

		//$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
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
		$this->mail->msgHTML($layout_email);

		foreach ($layoutImage as $key => $value) {
			$this->mail->AddEmbeddedImage($key, $value);
		}

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