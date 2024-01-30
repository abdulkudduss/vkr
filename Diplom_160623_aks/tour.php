
<?php  
session_start();
include "auth/db_conn.php";
$idPack = $_GET['idPacK'];

//$idGuide = $_SESSION['idGuide'];


                        try{
                                    $query1 = 'select * from  ` экскурсии` where `id_Экскурсии`='.$idPack;
                                    $result2 = mysqli_query($conn, $query1);
                                    $result=mysqli_fetch_assoc($result2);
                                  
                                    //get info about guide
                                  
                                    $query2 = 'select * from  `гиды` where `idГида`='.$result['id_Гида'];
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tour</title>
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
    <link href="style_Tour.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />
<script>
textButt="Оправить заявку"
function orderB(){
    <?php 
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=="user"){
                ?>
                textButt="Отправить заявку"
                document.getElementById('output').innerHTML = textButt;
                <?php
            }else{
                ?>
                alert("Сначала Зарегистрируйтесь!")
            //    window.location.href ="/auth/index.php"
                //header('Location: authd/index.php');
                <?php
            }
        }else{
            ?>
            alert("Сначала Зарегистрируйтесь!")
            <?php
        }
        ?>
}
function msgB(){
    textButt="Отправить сообщение"
    document.getElementById('output').innerHTML = textButt;
   // document.getElementById('output').
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
    <div class="mr" style="margin-top: 100px;" >


    <main class="container">
    <?php
            if (isset( $_SESSION['message2'])) {
                echo '<p class="msg"> ' . $_SESSION['message2'] . ' </p>';
            }
            unset($_SESSION['message2']);
        	?>
      <!-- Left Column / Headphones Image -->
      <div class="left-column" >
       
        <img data-image="red" class="active" src="images/<?=$result['фото']?>" alt="" style="max-height:  400px ; max-width: 700px;">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Экскурсия</span>
          <h1><?=$result['Название экскурсии']?></h1>
         <p>====================================================</p>
        </div>

        <div class="product-description">
          <span>Гид</span>
          <h1><?=$resultG['Имя']?></h1>
         <p>====================================================</p>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
          <span><?=$result['Стоимость']?>$</span>
          <a href="#recordForm" onclick="orderB()" class="cart-btn">Записатся</a>
         
        </div>
        <a href="#recordForm" class="cart-btn" style="margin-top: 20px; "   onclick="msgB()">Задать вопрос гиду</a>
      </div>
    </main>

    <div style="margin: 50px 90px;  ">
        <h1 style=" margin-left: 40px">Описание экскурсии</h1>
        <section style="padding: 30px; max-width:1200px  " >
            <p style=" margin-left: 40px"><?=$result['Описание_экскурсии']?>
</p>
        </section>
    </div>
    <section id="recordForm">
                    <div class="container-lg">
                   
                    <div class="text-center">
                        <h2>Заполните и отправьте заявку на экскурсию </h2>
                        
                    </div>
                 
                    <div class="row justify-content-center my-5">
                        <div class="col-lg-6">
                        
                        <form action="MSG&order.php" method="post"  >
                            <label for="nametourist"  class="form-label">Ваше имя *</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary">[]</i>
                                </span>
                                <input type="text" id="nametourist" name="nametourist" class="form-control" placeholder="Азамат"  />
                            </div>

                          
                            
                            <label for="msg_tourst_toguide" class="form-label">Текст сообщения *</label>
                            <div class="mb-4 mt-2 form-floating">
                                <textarea class="form-control" id="query" name="msg_tourst_toguide" style="height: 140px" placeholder=""></textarea>
                                <label for="query">Сообщите гиду куда вы направляетесь. Предполагаемые даты приезда? Сколько вас человек? Опишите ваши 
                                    предпочтения, пожелания и укажите контакты для связи
                                     с вами (телефон, Skype, Whatsapp, Viber и т.п.)</label>
                            </div>
                               
                           

                            <div class="text-center">
                             
                                <label for="numbertourist"  class="form-label">Номер телефона *</label>
                                <div class="input-group mb-4">
                                    <input type="text" id="numbertourist" name="numbertourist" class="form-control" placeholder="+xxx xxx xx xx " />
                                </div>
                                
                                <label for="emailtourst"  class="form-label">Email *</label>
                                <div class="input-group mb-4">
                                    <input type="text" id="site" name="emailtourst" class="form-control" placeholder="URL" />
                                </div>
                                
                                
                                <input type="hidden" name="idguideMSgORDER" value="<?=$result['id_Гида']?>">
                                
                               
                                <input type="hidden" name="iduserMSgORDER" value="<?=$_SESSION['iduser']?>">                         
                               
                                <input type="hidden" name="idpackMSgORDER" value="<?=$idPack?>">

                                <div class="mb-4 text-center">
                                    <button type="submit" class="btn btn-secondary" id="output"> </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
             </section>
             </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
