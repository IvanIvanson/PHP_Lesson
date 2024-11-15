<?php
  require_once('header.php');
?>
<?
  if(empty($_SESSION['id'])):
?>
<script>location.href = '/avt.php';</script>
<? else: ?>
<div class="container">
  <h1 class="text-center my-5">
    Добавление статьи
  </h1>
  <div class="col-5 mx-auto">
    <form action="/php/handlerAddArticle.php" method="post">
      <div class="mb-3">
        <input type="text" name="title" class="form-control" placeholder="Статья">
        </div>
      <div class="mb-3">
        <textarea name="content" class="form-control" placeholder="Текст статьи"></textarea>
      </div>
      <div class="mb-3">
        <input type="text" name="author" class="form-control" placeholder="Автор">
        </div>
      <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" vakue="Добавить статью">
        </div>
    </form>
  </div>
</div>
<?php
    endif;
   require_once('footer.php');
?>