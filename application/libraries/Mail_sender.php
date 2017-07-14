<?php
	require_once('AppConfig.php');
	require_once(dirname(__FILE__).'/../helpers/PHPMailer/PHPMailerAutoload.php');

	class Mail_sender {

		private $mail;

		public function __construct() {
			$this->mail = new PHPMailer;
			$this->mail->isSMTP();
			$this->mail->Host = 'smtp.gmail.com';
			$this->mail->SMTPAuth = true;
			$this->mail->Username = appconfig::getAppAdminEmail();
			$this->mail->Password = appconfig::getAppAdminPassword();
			$this->mail->SMTPSecure = 'tls';
			$this->mail->Port = 587;
			$this->mail->isHTML(true);
		}

		public function sendMail($fromMail, $fromName, $to, $subject, $message) {
			$this->mail->setFrom($fromMail, $fromName);
			$this->mail->addAddress($to);
			$this->mail->Subject = '[Club-des-Critiques] -'.$subject;
			$this->mail->Body = $message;
			$this->mail->send();
		}
	}
?>
