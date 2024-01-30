<?php  
session_start();
include "../auth/db_conn.php";
$flag = $_POST['fromEDIT'];
if($flag=="edit"){
  
        //$idGuide = intval($_SESSION['idGuide']);
        $name = $_POST['namepackage'];
        $description = $_POST['description'];
        $typeOfTour = $_POST['typeOfTour'];
        $regionOfTour = $_POST['regionOfTour'];
        $duration = $_POST['duration'];
        $price = intval($_POST['price']);
       // $photosOfTour = $_POST['photosOfTour'];
        $idPack=$_POST['fromEDIT_idpack'];
      
    
        
    
        if (empty($name) || empty($description) || empty($typeOfTour)|| empty($price)|| empty($regionOfTour)  ) {
            $_SESSION['message1'] ='Заполните все поля отмеченные звездочками!';
            //echo("ye!");
            header("Location: ../profile/create_package.php");
        }else{
                
            $filename = $_FILES["photosOfTour"]["name"];
            if($filename==""){
                    $filename = $_POST['fromEDIT_photo'];
            }else{
                $filename= rand(1,100).$filename;
                $tempname = $_FILES["photosOfTour"]["tmp_name"];
                $folder = "../images/" . $filename;
            
            
            
                // Now let's move the uploaded image into the folder: image
                if (!move_uploaded_file($tempname, $folder)) {
                
                    $_SESSION['messageERROR'] ='FAILED UPLOAD IMG!';
                    header("Location: ../profile/create_package.php");
                }
        }
        $stmt = $conn -> prepare('UPDATE ` экскурсии` SET  `Название экскурсии`=?, `Описание_экскурсии`=?, `Регион`=?, `Стоимость`=?, `Продолжительность`=?, `фото`=?, `тип`=? WHERE ` экскурсии`.`id_Экскурсии` = ? ') ;
        $stmt -> bind_param("sssisssi",$name,$description,$regionOfTour,$price,$duration,$filename,$typeOfTour,$idPack);
        $stmt -> execute();
        $_SESSION['message1'] = 'Данные экскурсии успешно обновлен!';
        header("Location: ../profile/create_package.php");
    
        }
    
    


}else{

	$idGuide = intval($_SESSION['idGuide']);
	$name = $_POST['namepackage'];
    $description = $_POST['description'];
    $typeOfTour = $_POST['typeOfTour'];
    $regionOfTour = $_POST['regionOfTour'];
    $duration = $_POST['duration'];
    $price = intval($_POST['price']);
   // $photosOfTour = $_POST['photosOfTour'];
	
  

    

	if (empty($name) || empty($description) || empty($typeOfTour)|| empty($price)|| empty($regionOfTour)  ) {
        $_SESSION['message1'] ='Заполните все поля отмеченные звездочками!';
        //echo("ye!");
		header("Location: ../profile/create_package.php");
	}else{

        $filename = $_FILES["photosOfTour"]["name"];
        $filename= rand(1,100).$filename;
        $tempname = $_FILES["photosOfTour"]["tmp_name"];
        $folder = "../images/" . $filename;
     
     
     
        // Now let's move the uploaded image into the folder: image
        if (!move_uploaded_file($tempname, $folder)) {
           
            $_SESSION['messageERROR'] ='FAILED UPLOAD IMG!';
            header("Location: ../profile/create_package.php");
        }
    $stmt = $conn -> prepare('INSERT INTO ` экскурсии` (`id_Гида`, `Название экскурсии`, `Описание_экскурсии`, `Регион`, `Стоимость`, `Продолжительность`, `фото`, `тип`)  VALUES ( ?, ?, ?, ?, ?, ?, ?,?)');
    $stmt -> bind_param("isssisss",$idGuide,$name,$description,$regionOfTour,$price,$duration,$filename,$typeOfTour);
    $stmt -> execute();
    $_SESSION['message1'] = 'Экскурсия успешно создан!';
    header("Location: ../profile/create_package.php");

    }
}