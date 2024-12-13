<form class="col-lg-6 mx-auto" action="/changeArticle" method="post">
      <div class="mb-3">
        <input id="inpTitle" type="text" name="title" class="form-control" placeholder="Название статьи">
        </div>
      <div class="mb-3">
        <textarea id="inpText" name="content" class="form-control" placeholder="Текст статьи"></textarea>
      </div>
      <div class="mb-3">
        <input id="inpAuthor" type="text" name="author" class="form-control" placeholder="Автор">
        </div>
      <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" value="Изменить статью">
        </div>
    </form>
<script>
    let formData = new FormData();
    let id =  location.pathname.split("/")[2];//получение id из url
    let inpTitle = document.getElementById("inpTitle");
    let inpText = document.getElementById("inpText");
    let inpAuthor = document.getElementById("inpAuthor");

    formData.append('id', id);

    fetch('/getArticleById',{
        method: "POST",
        body: formData
    }).then(response=>response.json())
        .then(result=>{
            inpTitle.value = result.title;
            inpText.value = result.content;
            inpAuthor.value =result.author;
        });
</script>
