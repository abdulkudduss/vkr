
<?php  
session_start();
include "../auth/db_conn.php";

if (!isset($_SESSION['idGuide'])){
  header("Location: index.php?error=Сначала авторизируйтесь!");
}
//$idGuide = $_SESSION['idGuide'];
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- Google Fonts -->
<style>

.msg {
    border: 2px solid #ffa908;
    border-radius: 3px;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}

* {box-sizing: border-box}
.container-fluid{
  padding-top: 40px;
  margin-top: 40px;
}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 100px 20px;
  height: 100%;
}


</style>
<script>
        function loadDoc(url, cFunction,str1,method) {
                        const xhttp = new XMLHttpRequest(); //
                        xhttp.onload = function() { //функци к-я обр-т ответ сервера
                            cFunction(xhttp);
                        }
                        if(method=='POST'){
                            xhttp.open(method, url);//initaliaze connection
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send('namepackage=test');
                        }else{
                            xhttp.open(method, url+str1);//initaliaze connection
                        xhttp.send();
                        }
                      
                    }

                    function myFunction1(xhttp) {
                        if(xhttp.readyState==4 && xhttp.status ==200){
                            document.getElementById("response-container").innerHTML=xhttp.responseText;
                           document.getElementById("response-container").style.border="1px solid #A5ACB2";
                           document.getElementById("response-container").style.width="180px";
                            
                        }else{
                            alert('Error getting data from server!!!');
                        }
                    }
 </script>
</head>
<body>

 <!-- Navbar начало -->
 <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="#" id="logo"><span>LOC</span>ALS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
               <div class="d-flex ">
                 <button  class="btn btn-primary" type="button"><a href="../auth/logout.php"  style=" text-decoration: none; color:white">Выйти</a></button>
               </div>
           </div>


        </div>
        
</nav>
 <!-- Navbar конец -->

<div>
  <div class="container-fluid">
      <div class="row">
         <!-- sidebar начало -->
          <div class="col-sm-auto bg-light ">          
              <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                  <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                      <i class="bi-bootstrap fs-1"></i>
                  </a>
                  <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                      <li class="nav-item">
                          <a href="../profile.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                              <i class="bi-house fs-1">О себе</i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                              <i class="bi-speedometer2 fs-1">Экскурсии</i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="order.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                              <i class="bi-table fs-1">Заявки</i>
                          </a>
                      </li>
                      <li class="nav-item"> 
                          <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                              <i class="bi-heart fs-1">Отзывы</i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                              <i class="bi-people fs-1">Подписка</i>
                          </a>
                      </li>
                  </ul>
        
              </div>
          </div>
         <!-- sidebar конец -->
          <div  class="col-sm p-3 min-vh-100">

                <?php
                    if (isset( $_SESSION['message1'])) {
                        echo '<p class="msg" > ' . $_SESSION['message1'] . ' </p>';
                    
                    }
                    if (isset( $_SESSION['messageERROR'])) {
                    
                        echo '<p class="msg" > ' .  $_SESSION['messageERROR'] . ' </p>';
                    }
                    unset($_SESSION['message1']);
                    unset( $_SESSION['messageERROR']);
                    ?>
          
                
                 <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#createPack">Добавить экскурсю</button>
                    <div id="createPack" class="collapse">
                <!-- content -->
                        <h2 >Экскурсии</h2>
                        <hr />
                        <section id="packageForm">
                                <div class="container-lg">
                                
                                <div class="text-center">
                                    <h2>Форма заполнение экскурсии </h2>
                                    <p class="lead">Заполните все поля на русском!</p>
                                </div>
                                <div class="row justify-content-center my-5">
                                    <div class="col-lg-6">
                                    
                                    <form action="../check_prof_form/ch_Create_pack.php" method="post"  enctype="multipart/form-data" >
                                
                                        <label for="namepackage"  class="form-label">Название экскурсии *</label>
                                        <div class="input-group mb-4">
                                            <span class="input-group-text">
                                                <i class="bi bi-envelope-fill text-secondary">[]</i>
                                            </span>
                                            <input type="text" id="namepackage" name="namepackage" class="form-control" placeholder="Тур по Бишкеку" />
                                        </div>

                                        <label for="description" class="form-label">Описание экскурсии *</label>
                                        <div class="mb-4 mt-2 form-floating">
                                            <textarea class="form-control" id="description" name="description" style="height: 140px" placeholder="#" ></textarea>
                                            <label for="query">Пишите описание ...</label>
                                            </div>
                                        
                                    
                                        <label for="typeOfTour" class="form-label">Тип экскурсии *</label>
                                        <div class="mb-4 input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-chat-right-dots-fill text-secondary"></i>
                                            </span>
                                            <select class="form-select" id="typeOfTour" name="typeOfTour">
                                                <option value="Пешая" selected>Пешая</option>
                                                <option value="На автомобиле">На автомобиле</option>   
                                            </select>
                                        </div>

                                        <label for="regionOfTour" class="form-label">Регион проведение экскурсии *</label>
                                        <div class="mb-4 input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-chat-right-dots-fill text-secondary"></i>
                                            </span>
                                            <select class="form-select" id="regionOfTour" name="regionOfTour">
                                                <option value="Бишкек" selected>Бишкек</option>
                                                <option value="Алай">Алай</option> 
                                                <option value="ОШ" selected>ОШ</option>
                                                <option value="Ноокат">Ноокат</option>   
                                                <option value="Ысык-Куль" selected>Ысык-Куль</option>
                                                <option value="Кара-кой">Кара-кой</option>   
                                                <option value="Талас" selected>Талас</option>
                                                <option value="Сары-Челек">Сары-Челек</option>     
                                            </select>
                                        </div>


                                        <label for="price"  class="form-label">Стоимость *</label>
                                        <p>([]Пишите реальные цены, экскурсии по 1$ и прочие подозрительно дешевые экскурсии будут удаляться! Экономьте свое и наше время!)</p>
                                        <div class="input-group mb-4">
                                            <span class="input-group-text">
                                                <i class="bi bi-envelope-fill text-secondary">[$]</i>
                                            </span>
                                            <input type="text" id="price" name="price"  class="form-control" placeholder="Цена в долларах" />
                                        </div>

                                        <label for="duration"  class="form-label">Продолжительность экскурсии (часов):</label>
                                        <div class="input-group mb-4">
                                            <span class="input-group-text">
                                                <i class="bi bi-envelope-fill text-secondary">[^]</i>
                                            </span>
                                            <input type="text" id="duration"  name="duration" class="form-control" placeholder="" />
                                        </div>

                                        <label for="photosOfTour" class="form-label">Фотогалерея экскурсии *</label>
                                        <div class="input-group mb-4"> 
                                            <input class="form-control" type="file" id="photosOfTour" name="photosOfTour"  />
                                        </div>
                                        <div class="mb-4 text-center">
                                            <button  class="btn btn-secondary">Сохранить</button>
                                        </div>
                                        
                                    </form>
                                    </div>
                                </div>
                                </div>
                        </section>
                    </div>
                 <div class="d-flex flex-row" >
                 <div class="container" style="margin-bottom:40px;">
                <div class="main-txt">
                <h1> Уже опубликованные <span>Экс</span>курсии</h1>
                </div>

               
                <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                <?php
                    $query = "select * from ` экскурсии` where `id_Гида`=".$_SESSION['idGuide']."";
                    $result = mysqli_query($conn, $query);
                    $result=mysqli_fetch_all($result);
                    foreach($result as $result){
                    ?>
                    <div class="col-md-4 py-3 py-md-0">
                    
                   
             
                        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                     
                            <img src="../images/<?=$result[7]?>" style=" max-height:  215px ; max-width: 370px;"  alt="">
                 
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
                                <a href="../edit/package.php?idPack=<?=$result[0]?>" style="padding: 10px;
                                        text-decoration: none;
                                        background: #ffa500;
                                        color: white;
                                        border-radius: 5px;" >Изменить</a>
                                                                    <a href="../edit/del.php?idPackD=<?=$result[0]?>" style="padding: 10px;
                                        text-decoration: none;
                                        background: #ffa500;
                                        color: white;
                                        border-radius: 5px;">Удалить</a>
                            </div>
                        </div>
                     
                    </div>
                    <?php    } ?>
                </div>
              
           </div>
                 </div>
            </div>
      </div>
  </div>
    
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html> 
