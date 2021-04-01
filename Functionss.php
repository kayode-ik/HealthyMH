<?php

//Functions Class
class Functionss
{
	public function dbConnect()
	{
		return new PDO("mysql: host=localhost; port=3306; dbname=bookinghmh", "root", "");
	}
	private $db;

	//create a constructor
	public function __construct()
	{
		//$this->db = new Connections();
		$this->db = $this->dbConnect();
	}

	//admin login method processor
	public function adminLogin($username, $password)
	{
		try {

			$response = array();
			if (!empty($username) && !empty($password)) {
				$st = $this->db->prepare("select * from admin where username=? and password=?");
				$st->bindParam(1, $username);
				$st->bindParam(2, $password);
				$st->execute();
				if ($st->rowCount() >= 1) {
					$_SESSION['admin'] = "$username";
					$response['response_code'] = 0;
					$response['response_message'] = "Login Successful";
				} else {
					$response['response_code'] = -1;
					$response['response_message'] = "Invalid Login Credentials.";
				}
			} else {
				$response['response_code'] = -2;
				$response['response_message'] = "Username and password field are empty.";
			}
			return $response;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$db = null;
	}


	public function postFormUser(
		$firstname,
		$lastname,
		$email,
		$phone,
		$date,
		$booktime,
		$details

	) {
		try {
			if (!empty($email) && !empty($date) && !empty($booktime)) {
				$result =  $this->validateUsername($email, $date, $booktime);

				if ($result == 1) {
					$response['response_code'] = -2;
					$response['response_message'] = "Booking has previously been made";
				} else {
					$st = $this->db->prepare("insert into bookings(firstname,lastname,email,phoneNumber,
				date,booktime,details) values (?,?,?,?,?,?,?)");
					$st->bindParam(1, $firstname);
					$st->bindParam(2, $lastname);
					$st->bindParam(3, $email);
					$st->bindParam(4, $phone);
					$st->bindParam(5, $date);
					$st->bindParam(6, $booktime);
					$st->bindParam(7, $details);


					if ($st->execute()) {
						$response['response_code'] = 0;
						$response['response_message'] = "Booking Successful. ";
						$this->sendBookingEmail($firstname,$lastname,$email,$phone,$date,$booktime,$details);
					} else {
						$response['response_code'] = -1;
						$response['response_message'] = "Problem cccurred while Booking.";
					}
				}
			} else {
				$response['response_code'] = -2;
				$response['response_message'] = "Please enter a valid username, email, and password.";
			}
		} catch (PDOException $e) {
			$response['response_code'] = -5;
			$response['response_message'] = "Error: " . $e->getMessage();
		}
		return $response;
		$db = null;
	}

	public function validateUsername($email, $date, $booktime)
	{
		try {
			$response = false;
			if (!empty($email) && !empty($date) && !empty($booktime)) {
				$query = $this->db->prepare("select * from bookings where email=:email AND date=:date AND booktime=:booktime ");
				$parameter = array(':email' => $email, ':date' => $date, ':booktime' => $booktime);
				$query->execute($parameter);
				$data = $query->fetchAll();
				if (count($data) >= 1) {
					return true;
				} else {
					return false;
				}
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$db = null;
	}


	public function sendEmail($subject, $email, $email_content, $randomNumber, $filename)
	{
		$email_array = explode(",", $email);
		require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
		require("vendor/phpmailer/phpmailer/src/Exception.php");
		require("vendor/phpmailer/phpmailer/src/SMTP.php");

		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "traderszonefx@traderszonefx.com";
		$mail->Password = "traderszonefx";
		$mail->addAttachment("emails/upload/$randomNumber/" . $filename);
		$mail->setfrom("accounts@traderszonefx.com");
		$mail->Subject = $subject;
		$mail->Body = "$email_content";

		foreach ($email_array as $emailer) {
			$mail->AddAddress("$emailer");
			$result = $mail->Send();
			// echo $emailer;
		}
		echo $result;
		$response = array();
		if ($result == 1) {
			header("Location: /CoolAdmin/compose-email.php?s=Mail Sent");
			exit;
			// $response['response_code'] = 0;
			// $response['response_message'] = "Mail Sent";
		} else {
			header("Location: /CoolAdmin/compose-email.php?e=Mail not Sent");
			exit;
			// $response['response_code'] = -1;
			// $response['response_message'] = "Mail Not Sent";

		}
	}

	public function sendBookingEmail($firstname,$lastname,$email,$phone, $date, $booktime,$details)
	{
		//email setup
		$email_content = "";
		$email_content .= "$firstname.' '.$lastname\n\n";
		$email_content .= "The name above just booked a session with you.\n\n";
		$email_content .= "Here are the booking details\n\n";
		$email_content .= "Email: $email\n\n";
		$email_content .= "Phone: $phone\n\n";
		$email_content .= "Date: $date\n\n";
		$email_content .= "BookingTime: $booktime\n\n";
		$email_content .= "These are the details: $details\n\n";


		require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
		require("vendor/phpmailer/phpmailer/src/Exception.php");
		require("vendor/phpmailer/phpmailer/src/SMTP.php");
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "booking@thehealthymarriagehub.com";
		$mail->Password = "Thehealthymarriagehub";
		$mail->setfrom("booking@thehealthymarriagehub.com");
		$mail->Subject = "Booking Events";
		$mail->Body = "$email_content";
		$mail->AddAddress("ipentankayode5@gmail.com");
		//send mail
		$result = $mail->Send();

		if ($result) {
			$response['response_code'] = 0;
			$response['response_message'] = "Mail Sent";
		} else {
			$response['response_code'] = -1;
			$response['response_message'] = " Mail Not Sent";
		}
		return $response;
	}

	public function getAllUser()
	{

		try {
			$response = array();

			$sql = $this->db->query("select * from bookings");
			$data = $sql->fetchAll();
			$i = 0;
			foreach ($data as $row) {
				$response[$i]['id'] = $row["id"];
				$response[$i]['firstname'] = $row["firstname"];
				$response[$i]['lastname'] = $row["lastname"];
				$response[$i]['email'] = $row["email"];
				$response[$i]['phone'] = $row["phone"];
				$response[$i]['address'] = $row["address"];
				$response[$i]['status'] = $row["status"];
				$response[$i]['occupation'] = $row["occupation"];
				$response[$i]['grant_reason'] = $row["grant_reason"];
				$response[$i]['created_date'] = $row["created_date"];
				$i++;
			}

			return $response;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$db = null;
	}
}
