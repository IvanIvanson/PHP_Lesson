<?php
header ('Content-type: text/html; charset=utf-8');
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];
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
 
?>