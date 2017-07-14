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
			$this->mail->Username = AppConfig::getAppAdminEmail();
			$this->mail->Password = AppConfig::getAppAdminPassword();
			$this->mail->SMTPSecure = 'tls';
			$this->mail->Port = 587;
			$this->mail->isHTML(true);
		}

		public function contact_user($from, $to, $item) {
			$this->mail->setFrom(AppConfig::getAppAdminEmail(), '[Club des Critiques] - Administrateur');
			$this->mail->addAddress($to);
			$this->mail->Subject = '[Club des Critiques] - Demande d\'échange';
			$this->mail->Body = 'L\'utilisateur '.$from['name'].' ('.$from['email'].') souhaiterait discuter avec vous pour échanger l\'oeuvre : <br />';
			$this->mail->Body .= $item->title.' - '.$item->category->type->name.' - '.$item->category->name.'<br />';
			$this->mail->Body .= '<a href="'.base_url().'">Le Club des Critiques</a>';
			$this->mail->send();
		}

		public function contact_admin($fromMail, $fromName, $subject, $message) {
			$this->mail->setFrom($fromMail, $fromName);
			$this->mail->addAddress(AppConfig::getAppAdminEmail());
			$this->mail->Subject = $subject;
			$this->mail->Body = $message;
			$this->mail->send();
		}
	}
?>
