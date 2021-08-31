<?php

	//signup
	$info = (Object)[];
	$data=false;
	$data['userid'] = $DB->generate_id(20);
	$data['date'] = date("Y-m-d H:i:s");

	// Validate Username
	alert($data);
	$data['username'] = $DATA_OBJ->username;
	if (empty($DATA_OBJ->username)) {
		$Error .= "Please enter a require username . <br>";
	}else
	{
		if (strlen($DATA_OBJ->username) < 3) 
		{
			
			$Error .= "username must be at least 3 characters long . <br>";
		}
		if (!preg_match("/^[a-z A-Z]*$/", $DATA_OBJ->username)) 
		{
			$Error .= "Please enter a valid username. <br>";
		}
	}

	// Validate Email
	$data['email'] = $DATA_OBJ->email;
	if (empty($DATA_OBJ->email)) {
		$Error .= "Please enter a require email . <br>";
	}else
	{
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $DATA_OBJ->email)) 
		{
			$Error .= "Please enter a valid email. <br>";
		}

	}

	//Validate Password
	$data['password'] = $DATA_OBJ->password;
	$password = $DATA_OBJ->password2;
	if (empty($DATA_OBJ->password)) {
		$Error .= "Please enter a require password . <br>";
	}else
	{
		if ($DATA_OBJ->password != $DATA_OBJ->password2) 
		{
			$Error .= "Please Re-type password . <br>";
		}
		if (strlen($DATA_OBJ->password) < 6) 
		{
			$Error .= "Password must be at least 6 characters long . <br>";
		}
	}

	if ($Error == "") {
		# code...
	
		$query = "insert into users (userid,username,email,password,date) values (:userid,:username,:email,:password,:date) ";
		$result = $DB->write($query,$data);


		if ($result) {
			$info ->message = "you are created.";
			$info ->data_type = "info";
			echo json_encode($info);
			# code...
		}else{

			$info ->message = "Sorry!you are not created.";
			$info ->data_type = "error";
			echo json_encode($info);
		}
	}else{

		$info ->message = $Error;
		$info ->data_type = "error";
		echo json_encode($info);
	}
