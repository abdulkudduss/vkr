<?php  
session_start();
include "auth/db_conn.php";


//$idGuide = $_SESSION['idGuide'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L 0 C @ L $</title>

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
    <!-- Google Fonts -->
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
              <li class="nav-item">
                <a class="nav-link active" href="auth/index.php">Войти</a>
              </li>
              <!--li class="nav-item">
                <a class="nav-link" href="#book">Book</a>
              </li-->
              <li class="nav-item">
                <a class="nav-link" href="#packages">Экскурсии</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#guides">Гиды</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallary">Галерея</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">О нас</a>
              </li>
             
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Например Бишкек ">
              <button class="btn btn-primary" type="button">Поиск</button>
            </form>
          </div>
        </div>
      </nav>
    <!-- Navbar конец -->






    <!-- Section Packages Начало -->
    <section class="packages" id="packages">
      <div class="container">
        
        <div class="main-txt">
          <h1><span>Г</span>иды</h1>
        </div>



        <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                <?php
                    $query = "select * from `гиды` ";
                    $result = mysqli_query($conn, $query);
                    $result=mysqli_fetch_all($result);
                    $i=0;
                    foreach($result as $result){
                     
                    ?>
                    <div class="col-md-4 py-3 py-md-0">
                    
                   
             
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                     
                            <img src="images/<?=$result[11]?>" style=" max-height:  215px ; max-width: 370px;"  alt="">
                 
                            <div class="card-body">
                                <h3><?=$result[2]?></h3>
                                <h3><?=$result[3]?></h3>
                                <a href="guide.php?idGuidE=<?=$result[0]?>" style="padding: 10px;
                                        text-decoration: none;
                                        background: #ffa500;
                                        color: white;
                                        border-radius: 5px;" >Посмотреть</a>
                                                                    
                            </div>
                        </div>
                     
                    </div>
                    <?php    } ?>
                   
                </div>
        <div class="row" style="margin-top: 30px;">



        </div>


      </div>
    </section>
    <!-- Section Packages Конец -->



    

    <!-- Footer Начало -->
    <footer id="footer">
      <h1><span>LOC</span>ALS</h1>
      <p>Место встречи гида и туриста</p>
      <div class="social-links">
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-pinterest-p"></i>
      </div>
      <div class="credit">
        <p>Designed By <a href="https://github.com/abdulkudduss" target="_blank">Imarov</a></p>
      </div>
      <div class="copyright">
        <p>&copy;Copyright aks. All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer Конец -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>