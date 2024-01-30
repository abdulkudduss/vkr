<?php  
session_start();
include "../auth/db_conn.php";


	$idGuide = intval($_SESSION['idGuide']);
	$name = $_POST['nameGuide'];
    $surname = $_POST['surnameGuide'];
    $about = $_POST['aboutGuide'];
    $lan = $_POST['lanOfGuide'];
    $add_lan = $_POST['addLanOfGuide'];
    $number = $_POST['numberGuide'];
    $site = $_POST['siteGuide'];
    $insta = $_POST['instaGuide'];
    $telega = $_POST['telegaGuide'];
   // $price = intval($_POST['price']);
   // $photosOfTour = $_POST['photosOfTour'];
	
  

    

	if (empty($name) || empty($surname) || empty($about)|| empty($number) || $_FILES["formAvatarGuide"]["name"]==""  ) {
        $_SESSION['message1'] ='Заполните все поля отмеченные звездочками!';
        //echo("ye!");
		header("Location: ../profile.php");
	}else{

        $filename = $_FILES["formAvatarGuide"]["name"];
        $filename= rand(1,100).$filename;
        $tempname = $_FILES["formAvatarGuide"]["tmp_name"];
        $folder = "../images/" . $filename;
     
     
     
        // Now let's move the uploaded image into the folder: image
        if (!move_uploaded_file($tempname, $folder)) {
           
            $_SESSION['messageERROR'] ='FAILED UPLOAD IMG!';
            header("Location: ../profile.php");
        }
    $stmt = $conn -> prepare(' UPDATE `гиды`SET `Имя`=?, `Фамилия`=?, `Номер_тел`=?, `Родной_язык`=?, `Доп_языки`=?, `О_себе`=?, `Аватар`=?, `Сайт`=?,`Инстаграм`=?,`Телеграм`=? where `гиды`.`idГида`=? ');
    $stmt -> bind_param("ssssssssssi",$name,$surname,$number,$lan,$add_lan,$about,$filename,$site,$insta,$telega,$idGuide);
    $stmt -> execute();
    $_SESSION['message1'] = 'Данные успешно добавлены!';
    header("Location: ../profile.php");

    }
