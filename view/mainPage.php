<div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7" id="content">
                 
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
            <script>
              fetch('/getArticles')
                .then(response=>response.json())
                .then(result=>{
                  for(let i = 0; i < result.length ; i++){
                    let postPreview = `
                       <!-- Post preview-->
                    <div class="post-preview">
                        <a href="/blog/${result[i].id}">
                            <h2 class="post-title">${result[i].title}</h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2023
                        </p>
                    </div>
                      <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    `;
                    content.innerHTML = content.innerHTML + postPreview;
                  }
                })
            </script>