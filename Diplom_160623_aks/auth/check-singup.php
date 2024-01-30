<?php  
session_start();
include "db_conn.php";



	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);
	$check_pass = test_input($_POST['password_pass']);
	if ($password!=$check_pass){
		header("Location: registration.php?error=Пароли не совпадают!");
	}
	if (empty($email)) {
		header("Location: registration.php?error=Пустое поле ПОЧТА!");
	}else if (empty($password)) {
		header("Location: registration.php?error=Пустое поле ПАРОЛЬ!");
	}else if($role =="guide"){

		$password=md5($password);
    $stmt = $conn -> prepare('INSERT INTO `гиды` (`Почта`, `Пароль`)  VALUES ( ?, ?)');
    $stmt -> bind_param("ss", $email,$password);
    $stmt -> execute();
    $_SESSION['message1'] = 'Регистрация прошла успешно!';
    header('Location: index.php');

	}else if($role =="user"){

		$password=md5($password);
		$stmt = $conn -> prepare('INSERT INTO `пользователи` (`Адрес электронной почты`, `Пароль`)  VALUES ( ?, ?)');
		$stmt -> bind_param("ss", $email,$password);
		$stmt -> execute();
		$_SESSION['message1'] = 'Регистрация прошла успешно!';
		header('Location: index.php');

	}
	