<?php  
session_start();
include "auth/db_conn.php";


	$idGuide = intval($_POST['idguideMSgORDER']);
    $idUser = intval($_POST['iduserMSgORDER']);
	$idpack = intval($_POST['idpackMSgORDER']);
    $txt = $_POST['msg_tourst_toguide'];
   // $price = intval($_POST['price']);
   // $photosOfTour = $_POST['photosOfTour'];
	
  

    

	if (empty($txt)  ) {
        $_SESSION['message2'] ='Заполните все поля отмеченные звездочками!';
        //echo("ye!");
		header("Location: tour.php?idPacK=.$");
	}else{

        
        $stmt = $conn -> prepare('INSERT INTO `заказы` (`id_туриста`, `id_гида`,`тексТ`,`id_экскурсии`)  VALUES ( ?, ?,?,?)');
		$stmt -> bind_param("iisi", $idUser,$idGuide,$txt,$idpack);
		$stmt -> execute();
    $_SESSION['message2'] = 'Ваш запрос принять! Ждите ответ гида.';
    header("Location: tour.php?idPacK=$idpack");

    }
