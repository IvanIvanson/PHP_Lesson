<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="container mt-5 col-3 mx-auto">
     <p><strong>Имя: </strong><span id="username"></span></p>
     <p><strong>Фамилия: </strong><span id="userlastname"></span></p>
     <p><strong>E-mail :</strong><span id="email"></span></p>
     <p><strong>id :</strong><span id="id"></span></p>
     
 </div>
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