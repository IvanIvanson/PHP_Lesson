<?php
   require_once('header.php');
?>
   <div class="container mt-5">
      <h2 class="text-center my-3">Вход на сайт</h2>
      <div class="col-4 mx-auto">
        <form action="handlerAvt.php" method='post'>
         
          <div class="mb-3">
            <input type="text" class="form-control" name="login" placeholder="Login" required>
            </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="pass" placeholder="Пароль" required>
            </div>
          <div class="mb-3">
            <input type="submit" class="form-control btn btn-primary" value="Войти">
            </div>
        </form>
      </div>
    </div>
<?php
   require_once('footer.php');
?>