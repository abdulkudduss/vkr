<?php  
session_start();
include "auth/db_conn.php";

if (!isset($_SESSION['idGuide'])){
  header("Location: index.php?error=Сначала авторизируйтесь!");
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
    <!-- Google Fonts -->
<style>
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
          <a class="navbar-brand" href="#" id="logo"><span>LOC</span>ALS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
               <div class="d-flex">
                   <button  class="btn btn-primary" type="button"><a href="auth/logout.php"  style=" text-decoration: none; color:white">Выйти</a></button>
               </div>
           </div>


        </div>
        
</nav>
 <!-- Navbar конец -->

<div>
  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-auto bg-light ">
              <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                  <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                      <i class="bi-bootstrap fs-1"></i>
                  </a>
                  <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                      <li class="nav-item">
                          <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                              <i class="bi-house fs-1">О себе</i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="profile/create_package.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                              <i class="bi-speedometer2 fs-1">Экскурсии</i>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="profile/order.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                              <i class="bi-table fs-1">Заявки</i>
                          </a>
                      </li >
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
          <div class="col-sm p-3 min-vh-100">
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


              <!-- content -->
              <h2 >О себе</h2>
              <hr />
              <section id="packageForm">
                    <div class="container-lg">
                    
                    <div class="text-center">
                        <h2>Заполните информацию о себе. </h2>
                        
                    </div>
                 
                    <div class="row justify-content-center my-5">
                        <div class="col-lg-6">
                        
                        <form action="check_prof_form/check_aboutG.php" method="post" enctype="multipart/form-data" >
                            <label for="nameGuide"  class="form-label">Имя *</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary">[]</i>
                                </span>
                                <input type="text" id="nameGuide" name="nameGuide" class="form-control" placeholder="Азамат"  />
                            </div>

                            <label for="surnameGuide"  class="form-label">Фамилия *</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary">[]</i>
                                </span>
                                <input type="text" id="surnameGuide" name="surnameGuide" class="form-control" placeholder="Азаматов" />
                            </div>
                            
                            <label for="aboutGuide" class="form-label">Расскажите о себе  *</label>
                            <div class="mb-4 mt-2 form-floating">
                                <textarea class="form-control" id="query" name="aboutGuide" style="height: 140px" placeholder="#"></textarea>
                                <label for="query">Пишите о себе  ...</label>
                            </div>
                               
                           
                            <label for="lanOfGuide" class="form-label">Ваш родной язык *</label>
                            <div class="mb-4 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-chat-right-dots-fill text-secondary"></i>
                                </span>
                                <select class="form-select" id="lanOfGuide" name="lanOfGuide">
                                    <option value="lan_ru" selected>Русский</option>
                                    <option value="lan_en">Английский</option>   
                                    <option value="lan_kg">Кыргызча</option>
                                </select>
                            </div>

                            <label for="addLanOfGuide" class="form-label">Язык, которыми вы также владеете</label>
                            <div class="mb-4 input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-chat-right-dots-fill text-secondary"></i>
                                </span>
                                <select class="form-select" id="addLanOfGuide" name="addLanOfGuide" >
                                    <option value="lan_ru" selected>Русский</option>
                                    <option value="lan_en">Английский</option>   
                                    <option value="lan_kg">Кыргызча</option>  
                                </select>
                            </div>

                            <label for="formAvatarGuide" class="form-label">Фотография вашего профиля *</label>
                            <div class="input-group mb-4"> 
                                <input class="form-control form-control-lg" id="formAvatarGuide" type="file" name="formAvatarGuide" />
                            </div>

                            <div class="text-center">
                             <h2>Ваши контакты </h2>
                              <label for="numberGuide"  class="form-label">Номер телефона *</label>
                              <div class="input-group mb-4">
                                  <input type="text" id="number" name="numberGuide" class="form-control" placeholder="+xxx xxx xx xx " />
                              </div>
                            
                              <label for="siteGuide"  class="form-label">Сайт</label>
                              <div class="input-group mb-4">
                                  <input type="text" id="site" name="siteGuide" class="form-control" placeholder="URL" />
                              </div>
                              
                              <label for="instaGuide"  class="form-label">Инстаграм</label>
                              <div class="input-group mb-4">
                                  <input type="text" id="insta" name="instaGuide" class="form-control" placeholder="@nick" />
                              </div>
                             
                              <label for="telegaGuide"  class="form-label">Телеграм</label>
                              <div class="input-group mb-4">
                                  <input type="text" id="telega" name="telegaGuide" class="form-control" placeholder="@nick" />
                              </div>
                            </div>
                            
                            <div class="mb-4 text-center">
                                <button type="submit" class="btn btn-secondary">Сохранить</button>
                            </div>
                            
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
