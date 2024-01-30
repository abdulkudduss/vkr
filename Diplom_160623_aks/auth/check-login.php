<?php  
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: index.php?error=Пустое поле ПОЧТА!");
	}else if (empty($password)) {
		header("Location: index.php?error=Пустое поле ПАРОЛЬ!");
	}else if($role =="guide"){

		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM гиды WHERE Почта='$username' AND Пароль='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['Пароль'] === $password ) {
        		$_SESSION['email'] = $row['Почта'];
        		$_SESSION['idGuide'] = $row['idГида'];
        		$_SESSION['username'] = $row['Имя'];
				$_SESSION['role'] = 'guide';
        		header("Location: ../profile.php");

        	}else {
        		header("Location: index.php?error=Incorect User email or password");
        	}
        }else {
        	header("Location: index.php?error=Incorect User email2 or password");
        }

	}else if($role =="user"){

		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM `пользователи` WHERE `Адрес электронной почты`='$username' AND `Пароль`='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['Пароль'] === $password ) {
        		$_SESSION['email'] = $row['Адрес электронной почты'];
        		$_SESSION['iduser'] = $row['idПользователя'];
        		$_SESSION['username'] = $row['Имя_Пользователя'];
				$_SESSION['role'] = 'user';
        		header("Location: ../user_page.php");

        	}else {
        		header("Location: index.php?error=Неправильный логин или пароль!");
        	}
        }else {
        	header("Location: index.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location: index.php");
}