<?
session_start();//старт сессии
  header ('Content-type: text/html; charset=utf-8');
  $mysqli = new mysqli('localhost', 'ghalutzw_10', '%Kit6BH!4vSi', 'ghalutzw_10');
  require_once('php/classes/User.php');
  require_once('php/classes/Blog.php');
  $uri = $_SERVER['REQUEST_URI'];
  $uri = explode('/', $uri);
  if ($uri[1] == 'reg'){
    $title = "Регистрация";
    $content = file_get_contents('view/reg.php');
  }else if ($uri[1] == 'avt'){
    $title = "Вход на сайт";
    $content = file_get_contents('view/avt.php');
  }else if($uri[1] == 'handlerReg'){
    User::handlerReg($_POST['name'], $_POST['lastname'], $_POST['login'], $_POST['pass']);
    exit;
  }else if($uri[1] == 'handlerAvt'){
    User::handlerAvt($_POST['login'], $_POST['pass']);
    exit;
  }else if($uri[1] == 'exit'){
    session_destroy();
    header('Location: /avt');
  }else if($uri[1] == 'user'){
    $title = "Личный кабинет";
    $content = file_get_contents('view/lk.php');
  }else if($uri[1] == 'getCurrentUser'){
    echo User::getCurrentUser();
    exit;
  }else if($uri[1] == ""){
    $title = "Главная";
    $content = file_get_contents('view/mainPage.php');
  }else if($uri[1] == "getArticles"){
    exit(Blog::getArticles());
  }else if($uri[1] == "blog"){
    $title = "Название статьи";
    $content = file_get_contents('view/article.php');
  }else if($uri[1] == "getArticleById"){
    $id = $_POST['id'];
    exit(Blog::getArticleById($id));
  }else if($uri[1] == "addArticle" and $_SERVER['REQUEST_METHOD']== 'POST'){
    /*echo $_SERVER['REQUEST_METHOD'];*/
   $title = $_POST['title'];
   $content = $_POST['content'];
   $author = $_POST['author'];
   Blog::addArticle($title, $content, $author);
  }else if($uri[1] == "addArticle" and $_SERVER['REQUEST_METHOD']== 'GET'){
    $title = "Добавление статьи";
    $content = file_get_contents('view/addArticle.php');
  }
  
  require_once("view/template.php");
?>