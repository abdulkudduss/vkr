
<?php  
session_start();
include "../auth/db_conn.php";
$idPack = $_GET['idPack'];

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

#Home {background-color: red;}
#News {background-color: green;}
#Contact {background-color: blue;}
#About {background-color: orange;}
</style>

</head>
<body>

 <!-- Navbar начало -->
 <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="../index.php" id="logo"><span>LOC</span>ALS</a>
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
    
          <div  class="col-sm p-3 min-vh-100">

              <!-- content -->
                    <h2 ><a href="../profile/create_package.php">Вернуться</a></h2>
                    <hr />
                    <section id="packageForm">
                            <div class="container-lg">
                            
                            <div class="text-center">
                                <h2>Вносите нужные изменение </h2>
                                <p class="lead">Заполните все поля на русском!</p>
                            </div>
                            <div class="row justify-content-center my-5">
                                <div class="col-lg-6">
                                <?php
                                try{
                                    $query1 = 'select * from  ` экскурсии` where `id_Экскурсии`='.$idPack;
                                    $result2 = mysqli_query($conn, $query1);
                                    $result=mysqli_fetch_assoc($result2);
                                }catch (mysqli_sql_exception $e) { 
                                    var_dump($e);
                                    exit; 
                                 } 
                                    ?>
                                <form action="../check_prof_form/ch_Create_pack.php" method="post"  enctype="multipart/form-data" >
                               
                                    <label for="namepackage"  class="form-label">Название экскурсии *</label>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope-fill text-secondary">[]</i>
                                        </span>
                                        <input type="text" id="namepackage" name="namepackage" class="form-control" value="<?=$result['Название экскурсии']?>" />
                                    </div>

                                    <label for="description" class="form-label">Описание экскурсии *</label>
                                    <div class="mb-4 mt-2 form-floating">
                                        <textarea class="form-control" id="description" name="description" style="height: 140px" value="" ><?=$result['Описание_экскурсии']?></textarea>
                                       
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
                                        <input type="text" id="price" name="price"  class="form-control" value="<?=$result['Стоимость']?>" />
                                    </div>

                                    <label for="duration"  class="form-label">Продолжительность экскурсии (часов):</label>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope-fill text-secondary">[^]</i>
                                        </span>
                                        <input type="text" id="duration"  name="duration" class="form-control" value="<?=$result['Продолжительность']?>" />
                                    </div>  

                                    <label for="photosOfTour" class="form-label">Фотогалерея экскурсии *</label>
                                    <p>_____ранее выбранное фото</p>
                                    
                                        <img src="../images/<?=$result['фото']?> " style="width: 120px; height:120px" alt="">
                                  
                                    <div class="input-group mb-4"> 
                                        <input class="form-control" type="file" id="photosOfTour" name="photosOfTour"  />
                                    </div>
                                    <div class="mb-4 text-center">
                                        <button type="submit"  class="btn btn-secondary">Сохранить</button>
                                    </div>
                                    <input type="hidden" value="edit" name="fromEDIT">
                                    <input type="hidden" value="<?=$idPack?>" name="fromEDIT_idpack">
                                    <input type="hidden" value="<?=$result['фото']?>" name="fromEDIT_photo">
                                </form>
                                </div>
                            </div>
                            </div>
                    </section>
                 
                
            </div>
      </div>
  </div>
    
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
