<? session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
     <p><strong>Имя: </strong><? echo $_SESSION['username']; ?></p>
     <p><strong>Фамилия: </strong><? echo $_SESSION['lastname']; ?></p>
     <p><strong>E-mail :</strong><? echo $_SESSION['email']; ?></p>
     <p><strong>id :</strong><? echo $_SESSION['id']; ?></p>
     <a href="/addArticle.php" class="btn btn-primary">Написать статью</a>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>