<?
session_start();
  header ('Content-type: text/html; charset=utf-8');
  $mysqli = new mysqli('MySQL-5.7', 'root', '', 'worker');
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
      exit(User::getCurrentUser());
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
  }else if($uri[1] == 'changeArticle' and $_SERVER['REQUEST_METHOD']== 'GET'){
      $title = "Редактировать статью";
      $content = file_get_contents('view/changeArticle.php');
  }else if($uri[1] == 'changeArticle' and $_SERVER['REQUEST_METHOD']== 'POST'){
      Blog::changeArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author']);
  }else if($uri[1] == 'delArticle' and $_SERVER['REQUEST_METHOD']== 'GET'){

      Blog::delArticle($_POST['id']);
  }



  else if ($uri[1] == 'contact'){
    $title = "Контакты";
    $content = file_get_contents('view/contact.php');
  }
  
  require_once("view/template.php");
?>