<?
  class User{
    public static function handlerReg($name, $lastname, $login, $pass){
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
      
      $mysqli = new mysqli('localhost', 'ghalutzw_10', '%Kit6BH!4vSi', 'ghalutzw_10');
      $result = $mysqli->query("SELECT id FROM users WHERE login = '$login'");
      if($result->num_rows){
        echo "Пользователь с такими данными уже зарегистрирован";
      }else{
       $mysqli->query("INSERT INTO users (`username`, `lastname`, `login`, `pass`) VALUES ('$name', '$lastname', '$login', '$pass')");
       echo "Новый пользователь '$name' создан!";
      }
    }
    public static function handlerAvt($login, $pass){
    
      $login = mb_strtolower($login);
      $login = trim($login);
      $pass = trim($pass);
      $mysqli = new mysqli('localhost', 'ghalutzw_10', '%Kit6BH!4vSi', 'ghalutzw_10');
      $result = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");
      $row = $result->fetch_assoc();
      if(password_verify($pass, $row['pass'])){
        $_SESSION['username'] = $row['username'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        echo "<a href='/view/lk.php'>Личный кабинет</a>";
      }else{
        echo "error";
      }
    }
    public static function getCurrentUser(){
      $user = [
        "name"=>"Ivan",
        "lastname"=>"Ivanov"
        ];
      return json_encode($user);
    }
  }
    
  ?>