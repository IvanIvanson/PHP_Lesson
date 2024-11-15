<?php
  require_once('php/db.php');
  require_once('header.php');
  $result = $mysqli->query("SELECT * FROM articles");
  //$row = $result->fetch_assoc();ассоциативный массив достаём данные в виде массива
?>
  <div class="container my-3">
    <h2 class='text-center my-5'>Главная страница</h2>
    <ul>
       <?while(($row = $result->fetch_assoc()) != null): ?>
          <li><a href="/article.php?id=<?= $row['id'] ?>"><?= $row['title']?></a></li>
       <? endwhile;?>
      </ul>
  </div>
<?php
   require_once('footer.php');
?>