<?php
 require_once('php/db.php');
 require_once('header.php');
 $id = $_GET['id'];
 $result = $mysqli->query("SELECT * FROM articles WHERE id='$id'");
 $row=$result->fetch_assoc();
 ?>
 <div class="container my-3">
   <h1 class="text-center my-3"><?= $row['title'] ?></h1>
   <p><?= $row['content'] ?></p>
   <p><?= $row['author'] ?></p>
   <? if(!empty($_SESSION['id'])): ?>
   <a href="/php/handlerDelArticle.php?id=<?=$id?>" class="btn btn-primary">Удалить статью</a>
   <? endif; ?>
 </div>
 <?php
   require_once('footer.php');
?>