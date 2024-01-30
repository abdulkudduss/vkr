<?php 
   session_start();
   if (!isset($_SESSION['email']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	      action="check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">Войти</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="email" 
		           class="form-label">E-mail</label>
		    <input type="text" 
		           class="form-control" 
		           name="email" 
		           id="email">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Пароль</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Выберите тип:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">	
			  <option selected value="user">Пользователь</option>
			  <option value="guide">Гид</option>
		  </select>
	
		  <button type="submit" 
		          class="btn btn-primary">Войти</button>
				  <br> <br> 
			<div class="mb-0">Нет аккаунта?   | <a href="registration.php">Зарегистрироватся</a>
		</div>
			<div class="alert alert-danger" role="alert">
			<?php
            if (isset( $_SESSION['message1'])) {
                echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
            }
            unset($_SESSION['message1']);
        	?>
		  </div>
		</form>
      </div>
</body>
</html>
<?php }else{
	if (isset($_SESSION['idGuide'])){
		$_SESSION['message1']="Сначала выйдите из текущего аккаунта И авторизируйтесь как ПОЛЬЗОВАТЕЛЬ!";
		header("Location: ../profile.php ");
	}
	if (isset($_SESSION['iduser'])){
		$_SESSION['message1']="Сначала выйдите из текущего аккаунта И авторизируйтесь заново!";
		header("Location: ../index.php ");
	}
	//header("Location: home.php");
} ?>