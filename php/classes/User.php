<?
  class User{
    public static function handlerReg($name, $lastname, $login, $pass){
        global $mysqli;
      if(empty($name) or empty($lastname) or empty($login) or empty($pass)){
      exit("не все поля заполнены!");
      }
      $login = mb_strtolower($login);
      $login = trim($login);
      $pass = trim($pass);
      $name = htmlspecialchars($name);
      $lastname = htmlspecialchars($lastname);
      $login = htmlspecialchars($login);
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      
//      $mysqli = new mysqli('MySQL-5.7', 'root', '', 'worker');
      $result = $mysqli->query("SELECT id FROM users WHERE login = '$login'");
      if($result->num_rows){
        echo "Пользователь с такими данными уже зарегистрирован";
      }else{
       $mysqli->query("INSERT INTO users (`username`, `lastname`, `login`, `pass`) VALUES ('$name', '$lastname', '$login', '$pass')");
       echo "Новый пользователь '$name' создан!";
      }
    }
    public static function handlerAvt($login, $pass){
        global $mysqli;
      $login = mb_strtolower($login);
      $login = trim($login);
      $pass = trim($pass);
//      $mysqli = new mysqli('MySQL-5.7', 'root', '', 'worker');
      $result = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");
      $row = $result->fetch_assoc();
      if(password_verify($pass, $row['pass'])){
        $_SESSION['username'] = $row['username'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['login'];
        $_SESSION['id'] = $row['id'];
        echo "<a href='/view/lk.php'style='display:inline-block;margin:40px 40%;font-size:2.2em; min-width:200px;'>Личный кабинет</a>";
      }else{
        echo "error";
      }
    }
    public static function getCurrentUser(){
        global $mysqli;
        $username = $_SESSION['username'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
        $login = $_SESSION['email'];
//        $result = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$id'");
//        $row = $result->fetch_assoc();
      $user = [
        "name" => $username,
        "lastname"=>$lastname,
        "email"=>$login,
        "id"=>$id,
        ];
      return json_encode($user);
    }
  }
    
  ?>