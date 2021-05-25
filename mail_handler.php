<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$subject=$_POST['subject'];
		$email=$_POST['email'];
		$msg=$_POST['msg'];

		$to='dev.cosmus@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject="Subject: ".$subject;
		$message="Name: ".$name."\n"."Wrote the following :"."\n\n".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}
	}
?>