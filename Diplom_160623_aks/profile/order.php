
<?php  
session_start();
include "../auth/db_conn.php";
//$idPack = $_GET['idPacK'];

$idGuide = $_SESSION['idGuide'];
try{
    $query1 = 'select * from  `заказы` where `id_гида`='.$idGuide;
    $result2 = mysqli_query($conn, $query1);
  
    //get info about guide
  
    //$query2 = 'select * from  `гиды` where `idГида`='.$result['id_Гида'];
   // $result3 = mysqli_query($conn, $query2);
   // $resultG=mysqli_fetch_assoc($result3);
}catch (mysqli_sql_exception $e) { 
    var_dump($e);
    exit; 
 } 

if(isset($_POST['btnOK'])){
    $ok="ок";
$k=intval($_POST['idd']  );
    $stmt = $conn -> prepare('UPDATE `заказы` SET `Статус заказа`=? WHERE `заказы`.`idЗаказа`=?');
    $stmt -> bind_param("si", $ok,$k);
    $stmt -> execute();

}
if(isset($_POST['btnNO'])){
    $no="Canceled";
    $k=intval($_POST['idd']  );
    $stmt = $conn -> prepare('UPDATE `заказы` SET `Статус заказа`=? WHERE `заказы`.`idЗаказа`=?');
    $stmt -> bind_param("si", $no,$k);
    $stmt -> execute();

}


                      
                                 


    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tour</title>
    <link rel="stylesheet" href="../style.css">
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
    <link href="style_Tour.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />
    <style>
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
<script>

</script>
  </head>

  <body>
     <!-- Navbar начало -->
     <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="../profile.php" id="logo"><span>LOC</span>ALS</a>
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
   


    <div class="container" style="margin: 90px auto;">
    <p>Новые заказы:</p>
    <?php 
    if(mysqli_num_rows($result2) >= 1){
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
       
       <?php              
    }else{
        ?>
<h1 style="color: green"> Нет новых заказов</h1>


<?php
    }
    
    ?>

<h3>История:</h3>
        <div class="collapsible">=</div>    
        <button type="button" class="collapsible">Open Collapsible</button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
    </div>
    <!-- Scripts -->
    <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
