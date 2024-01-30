
<?php  
session_start();
include "auth/db_conn.php";
if(isset($_POST['out'])){
  header("Location: auth/logout.php ");
}
if (!isset($_SESSION['iduser'])){
  header("Location: index.php?error=Сначала авторизируйтесь!");
}

$query2 = 'select * from  `пользователи` where `idПользователя`='.$_SESSION['iduser'];
                                    $result3 = mysqli_query($conn, $query2);
                                    $resultU=mysqli_fetch_assoc($result3);

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: 20% auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}


.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
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
            <form class="d-flex" method="post" >
              
              <button class="btn btn-primary " type="submit" name="out" style="margin-left:5px; ">Выйти</button>
            </form>
          </div>
        </div>
      </nav>
    <!-- Navbar конец -->
<h2 style="text-align:center">Карта пользователя</h2>

<div class="card">
  <img src="images/<?=$resultU['Аватар']?>" alt="№" style="width:100%">
  <h1><?=$resultU['Имя_пользователя']?></h1>
  <p class="title">Турист</p>

  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i> <?=$resultU['Соц_сети']?></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button>Contact</button></p>
</div>



<div class="container" style="margin: 90px auto;">
    <p>Новые заказы:</p>
    <?php 
   // if(mysqli_num_rows($result2) >= 1){
        $result=mysqli_fetch_assoc($result2);
        ?>

        <button type="button" class="collapsible">Открыть заказ</button>
        <div class="content">
       <a href="#"> <h5><?=$result['id_туриста'] ?> | перейти страницу туриста </h5> </a>
          <p><?=$result['тексТ'] ?></p>
          <form method="post" >
                <input type="hidden" name="idd" value="<?=$result['idЗаказа']?>">
                <button class =" button btn-primary"  type="submit" name="btnOK">Принять </button>
                <button class =" button btn-primary" type="submit" name="btnNO" >Отклонить </button>
                
          </form>
        </div>    
</div>
</body>
</html>
