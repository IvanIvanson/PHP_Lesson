<meta charset="utf-8" />
<link href="/view/css/styles.css" rel="stylesheet" />
<div id="myArticles">
  
</div>
 <div class="container mt-5 col-3 mx-auto">
   <a href="/addArticle" class='btn btn-primary'>Добавить статью</a>
     <p><strong>Имя: </strong><span id="username"></span></p>
     <p><strong>Фамилия: </strong><span id="userlastname"></span></p>
     <p><strong>E-mail :</strong><span id="email"></span></p>
     <p><strong>id :</strong><span id="id"></span></p>
     <!-- <p><strong>id :</strong><? echo $_SESSION['id']; ?></p> -->
 </div>
 
 <script>
   fetch('/getCurrentUser')
     .then(response=>response.json())
     .then(result=>{
       username.innerText = result.name;
       userlastname.innerText = result.lastname;
       email.innerText = result.email;
       id.innerText = result.id;
     });
 
     
 </script>