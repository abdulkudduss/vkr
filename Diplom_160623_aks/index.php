<?php  
session_start();
include "auth/db_conn.php";

if (isset($_SESSION['idGuide'])){
  header("Location: auth/index.php?error=Сначала авторизируйтесь как ПОЛЬЗОВАТЕЛЬ!");
}

if(isset($_POST['L_K'])){
  header("Location: user_page.php");
}
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

    <script>
      <?php
if (isset($_SESSION['iduser'])){
?>

  document.getElementById('lk').innerHTML = 'ЛК';

<?php
}
?>
      function pack(){
        window.location.href = "pack.php";
      }
      function guide(){
        window.location.href = "allGuides.php";
      }
    </script>
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
                <a class="nav-link active" href="auth/index.php" id="lk">Войти</a>
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
            <form class="d-flex" method="post" >
              <input class="form-control me-2" type="text" placeholder="Например Бишкек ">
              <button class="btn btn-primary" type="button">Поиск</button>
              <button class="btn btn-dark" type="submit" name="L_K" style="margin-left:5px; background-color: aqua;">ЛК</button>
            </form>
          </div>
        </div>
      </nav>
    <!-- Navbar конец -->





    <!-- Home Section Начало -->
    <div class="home">
        <div class="content">
        <?php
                    if (isset( $_SESSION['message1'])) {
                        echo '<p class="msg" > ' . $_SESSION['message1'] . ' </p>';
                    
                    }
                   
                    unset($_SESSION['message1']);
                   
                    ?>
            <h5>Гиды и экскурсии по всему миру!</h5>
            <h1>Визит в <span class="changecontent"></span></h1>
            <a href="#packages">Выбрать тур</a>
        </div>
    </div>
    <!-- Home Section когец -->


    <!-- Section Packages Начало -->
    <section class="packages" id="packages">
      <div class="container">
        
        <div class="main-txt">
          <h1><span>Экс</span>курсии</h1>
        </div>
<!-- 
        <div class="row" style="margin-top: 30px;">

          <div class="col-md-4 py-3 py-md-0">

            <div class="card">
              <img src="./images/uk.png" alt="">
              <div class="card-body">
                <h3>Велико Британия</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, doloribus!</p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star "></i>
                  <i class="fa-solid fa-star "></i>
                </div>
                <h6>Цена: <strong>$500</strong></h6>
                <a href="tour.php?idPack=">Записаться</a>
              </div>
            </div>

          </div>
          <div class="col-md-4 py-3 py-md-0">

            <div class="card">
              <img src="./images/france.png" alt="">
              <div class="card-body">
                <h3>Франция</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, doloribus!</p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star "></i>
                  <i class="fa-solid fa-star "></i>
                </div>
                <h6>Цена: <strong>$500</strong></h6>
                <a href="#book">Записатся</a>
              </div>
            </div>

          </div>
          <div class="col-md-4 py-3 py-md-0">

            <div class="card">
              <img src="./images/pakistan.png" alt="">
              <div class="card-body">
                <h3>Пакистан</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, doloribus!</p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star "></i>
                  <i class="fa-solid fa-star "></i>
                </div>
                <h6>Цена: <strong>$500</strong></h6>
                <a href="#book">Записатся</a>
              </div>
            </div>

          </div>



        </div> -->



        <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                <?php
                    $query = "select * from ` экскурсии` ";
                    $result = mysqli_query($conn, $query);
                    $result=mysqli_fetch_all($result);
                    $i=0;
                    foreach($result as $result){
                      $i++;
                      if($i==7)break;
                    ?>
                    <div class="col-md-4 py-3 py-md-0">
                    
                   
             
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                     
                            <img src="images/<?=$result[7]?>" style=" max-height:  215px ; max-width: 370px;"  alt="">
                 
                            <div class="card-body">
                                <h3><?=$result[2]?> | <?php intval($result[2])?></h3>
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
                                <a href="tour.php?idPacK=<?=intval($result[0])?>" style="padding: 10px;
                                        text-decoration: none;
                                        background: #ffa500;
                                        color: white;
                                        border-radius: 5px;" >Записатся</a>
                                                                    
                            </div>
                        </div>
                     
                    </div>
                    <?php    } ?>
                    <button type="button"  class="btn btn-primary" onclick="pack()"> Список Экскурсии </button>
                </div>
        <div class="row" style="margin-top: 30px;">
<!-- 
          <div class="col-md-4 py-3 py-md-0">

            <div class="card">
              <img src="./images/italy.png" alt="">
              <div class="card-body">
                <h3>Италия</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, doloribus!</p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star "></i>
                  <i class="fa-solid fa-star "></i>
                </div>
                <h6>Цена: <strong>$500</strong></h6>
                <a href="#book">Записатся</a>
              </div>
            </div>

          </div>
          <div class="col-md-4 py-3 py-md-0">

            <div class="card">
              <img src="./images/india.png" alt="">
              <div class="card-body">
                <h3>Индия</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, doloribus!</p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star "></i>
                  <i class="fa-solid fa-star "></i>
                </div>
                <h6>Цена: <strong>$500</strong></h6>
                <a href="#book">Записатся</a>
              </div>
            </div>

          </div>
          <div class="col-md-4 py-3 py-md-0">

            <div class="card">
              <img src="./images/us.png" alt="">
              <div class="card-body">
                <h3>США</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, doloribus!</p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star "></i>
                  <i class="fa-solid fa-star "></i>
                </div>
                <h6>Цена: <strong>$500</strong></h6>
                <a href="#book">Записатся</a>
              </div>
            </div>

          </div> -->



        </div>


      </div>
    </section>
    <!-- Section Packages Конец -->



    <!-- Section Gallary Начало -->
    <section class="gallary" id="gallary">
      <div class="container">

        <div class="main-txt">
          <h1><span>Гал</span>ерея</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
        <?php
                    $query1 = "select * from ` экскурсии` ";
                    $result1 = mysqli_query($conn, $query1);
                    $result1=mysqli_fetch_all($result1);
                    $i=0;
                    foreach($result1 as $result1){
                      $i++;
                      if($i==7)break;
                    ?>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card" style="margin-top: 20px;">
              <img src="images/<?=$result1[7]?>" alt="" height="230px"    >
            </div>
          </div>
          <?php    } ?>
          
         
        </div>

<!-- 
        <div class="row" style="margin-top: 30px;">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g4.png" alt="" height="230px">
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g5.png" alt="" height="230px">
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g6.png" alt="" height="230px">
            </div>
          </div>
        </div> -->

      </div>
    </section>
    <!-- Section Gallary Конец -->


      <!-- Section Guides Начало -->
      <section class="packages" id="guides">
      <div class="container">
        
        <div class="main-txt">
          <h1><span>Г</span>иды</h1>
        </div>


        <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                <?php
                    $query2 = "select * from `гиды`";
                    $result2 = mysqli_query($conn, $query2);
                    $result2=mysqli_fetch_all($result2);
                    $i=0;
                    foreach($result2 as $result2){
                      $i++;
                      if($i==7)break;
                    ?>
                    <div class="col-md-4 py-3 py-md-0">
                    
                   
             
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                     
                            <img src="images/<?=$result2[11]?>" style=" max-height:  215px ; max-width: 370px;"  alt="">
                 
                            <div class="card-body">
                                <h3>###<?=$result2[1]?></h3>
                                <h3>#######<?=$result2[2]?></h3>
                               
                              
                                <a href="guide.php?idGuidE=<?=$result2[0]?>" style="padding: 10px;
                                        text-decoration: none;
                                        background: #ffa500;
                                        color: white;
                                        border-radius: 5px;
                                         margin-left: 30%"
                                         >Посмотреть</a>
                                                                    
                            </div>
                        </div>
                     
                    </div>
                    <?php    } ?>
                    <button type="button"  class="btn btn-primary" onclick="guide()"> Список Гидов </button>
                </div>
        <div class="row" style="margin-top: 30px;">




        </div>


      </div>
    </section>
    <!-- Section Guides Конец -->

    <!-- About Начало -->
    <section class="about" id="about">
      <div class="container">

        <div class="main-txt">
          <h1>O <span>нас</span></h1>
        </div>

        <div class="row" style="margin-top: 50px;">

          <div class="col-md-6 py-3 py-md-0">
            <div class="card">
              <img src="./images/about-img.png" alt="">
            </div>
          </div>

          <div class="col-md-6 py-3 py-md-0">
            <h2>Уважаемые гиды, мы рады видеть вас на нашем  сайте</h2>
            <p>Для того, чтобы наш сайт был полезен как для гидов, так и для путешественников, 
              мы постарались сделать его максимально удобным для тех и других. Путешественникам он поможет в 
              планировании маршрутов, а гидам позволит рассказать о себе и о таких удивительных уголках планеты, в 
              которых стоит побывать каждому, кто не представляет своей жизни без ярких событий и увлекательных 
              путешествий. </p>
            <button id="about-btn">Дальше...</button>
          </div>

        </div>

      </div>
    </section>
    <!-- About Конец -->


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