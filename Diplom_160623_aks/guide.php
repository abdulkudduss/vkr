<?php  
session_start();
include "auth/db_conn.php";
$idguiDe = $_GET['idGuidE'];

//$idGuide = $_SESSION['idGuide'];


                        try{
                                 //   $query1 = 'select * from  ` экскурсии` where `id_Гида`='.$idguiDe;
                                 //   $result2 = mysqli_query($conn, $query1);
                                  //  $result=mysqli_fetch_assoc($result2);
                                  
                                    //get info about guide
                                  
                                    $query2 = 'select * from  `гиды` where `idГида`='.$idguiDe;
                                    $result3 = mysqli_query($conn, $query2);
                                    $resultG=mysqli_fetch_assoc($result3);
                                }catch (mysqli_sql_exception $e) { 
                                    var_dump($e);
                                    exit; 
                                 } 
?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css">
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap Link -->


    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Font Awesome Cdn -->


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->

<style>
body, html {
  height: 100%;
  margin: 0 10px;

  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("images/<?=$resultG['Аватар']?>");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 70%; 
  margin-top: 100px;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;

  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
  
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 12px;}
.button5 {border-radius: 50%;}


</style>
</head>
<body>

  <!-- Navbar начало -->
  <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="index.php" id="logo"><span>LOC</span>ALS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <!-- <li class="nav-item">
                <a class="nav-link active" href="auth/index.php">Войти</a>
              </li> -->
              <!--li class="nav-item">
                <a class="nav-link" href="#book">Book</a>
              </li-->
              <li class="nav-item">
                <a class="nav-link" href="#packages">Экскурсии</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#guides">Гиды</a>
              </li>
              
              
            </ul>
            
          </div>
        </div>
      </nav>
    <!-- Navbar конец -->

    <div class="bg-image"></div>

    <div class="bg-text">
    <img src="images/<?=$resultG['Аватар']?>" alt="" style="max-width: 400px;
  max-height: 400px;"  >
    
    <h1 style="font-size:50px"><?=$resultG['Имя']?></h1>
    </div>


<div class="hero-text">
   
  <a href="#msgguide">  <button class="button button4" >Написать гиду </button></a>
                            
    </div>

    <div style=" margin: auto 35%;" >
   <a href="#aboutt" > <button type="button" class=" button button4" >О себе </button></a>
   <a href="#pack_guide"> <button class="button button4" data-bs-toggle="collapse">Экскурсии </button></a>
   <a href="#contact_guide"><button class="button button4" data-bs-toggle="collapse" >Контакты </button> </a> 

   </div>
<section id="aboutt" style="margin: 50px 140px;" >
<p><?=$resultG['О_себе']?></p>
</section>
<section id="pack_guide">
<div class="d-flex flex-row" >
                 <div class="container" style="margin-bottom:40px;">
                <div class="main-txt">
                <h1>  <span>Экс</span>курсии </h1>
                </div>

               
                <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                <?php
                 $query = "select * from ` экскурсии` where `id_Гида`=".$idguiDe;
                    $result = mysqli_query($conn, $query);
                    $result=mysqli_fetch_all($result);
                    foreach($result as $result){
                    ?>
                    <div class="col-md-4 py-3 py-md-0">
                    
                   
             
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                     
                            <img src="images/<?=$result[7]?>" style=" max-height:  215px ; max-width: 370px;"  alt="">
                 
                            <div class="card-body">
                                <h3><?=$result[2]?></h3>
                                <?php $des =  substr($result[3],0,60); 
                                
                                ?>
                                <p><?=$des?>...</p>
                                <div class="star">
                                <i class="fa-solid fa-star checked"></i>
                                <i class="fa-solid fa-star checked"></i>
                                <i class="fa-solid fa-star checked"></i>
                                <i class="fa-solid fa-star "></i>
                                <i class="fa-solid fa-star "></i>
                                </div>
                                <h6>Цена: <strong>$<?=$result[5]?></strong></h6>
                                <a href="tour.php?idPacK=<?=$result[0]?>" style="padding: 10px;
                                        text-decoration: none;
                                        background: #ffa500;
                                        color: white;
                                        border-radius: 5px;" >Записатся</a>
                                                                    
                            </div>
                        </div>
                     
                    </div>
                    <?php    } ?>
                </div>
              
           </div>
                 </div>
</section>

<section id="contact_guide"style=" padding: 40px 80px" >
<div class="main-txt">
                <h1>  <span>Ко</span>нтакты </h1>
                </div>
<div style="font-size: 2rem; margin:20px auto;">
<div style=" margin:20px 150px"><i  class="far fa-address-book"></i> <?=$resultG['Номер_тел']?></div>
<div style=" margin:20px 150px"><i class="fas fa-envelope"></i><?=$resultG['Почта']?></div>
<div style=" margin:20px 150px"><a href=""><i class="fas fa-at"></i><?=$resultG['Сайт']?></a> </div>

<div style=" margin:20px 150px"><i class="fab fa-instagram"></i><?=$resultG['Инстаграм']?></div>
</section>

<section id="msgguide">

<div class="container-lg">
                    
                    <div class="text-center">
                        <h2>Сообщение гиду </h2>
                        
                    </div>
                 
                    <div class="row justify-content-center my-5">
                        <div class="col-lg-6">
                        
                        <form action="check_prof_form/check_aboutG.php" method="post" enctype="multipart/form-data" >
                            <label for="nameGuide"  class="form-label">Ваше имя *</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary">[]</i>
                                </span>
                                <input type="text" id="nameGuide" name="nameGuide" class="form-control" placeholder="Азамат"  />
                            </div>

                          
                            
                            <label for="aboutGuide" class="form-label">Текст сообщения *</label>
                            <div class="mb-4 mt-2 form-floating">
                                <textarea class="form-control" id="query" name="aboutGuide" style="height: 140px" placeholder=""></textarea>
                                <label for="query">Пишите сюда</label>
                            </div>
                               
                           

                            <div class="text-center">
                             
                              <label for="numberGuide"  class="form-label">Номер телефона *</label>
                              <div class="input-group mb-4">
                                  <input type="text" id="number" name="numberGuide" class="form-control" placeholder="+xxx xxx xx xx " />
                              </div>
                            
                              <label for="siteGuide"  class="form-label">Email *</label>
                              <div class="input-group mb-4">
                                  <input type="text" id="site" name="siteGuide" class="form-control" placeholder="URL" />
                              </div>
                              
                            
                            
                            <div class="mb-4 text-center">
                                <button type="submit" class="btn btn-secondary" id="output">Отправить  </button>
                            </div>
                            
                        </form>
                        </div>
                    </div>
                    </div>
</section>
</body>

</html>
