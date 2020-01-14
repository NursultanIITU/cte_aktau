@extends('layouts.app')
@section('content')
<div class="timeline-section" style="padding : 56px 0;">
        
      </div>
      <div class="articles -margin">
        <div class="container">
          <div class="row all-posts">
            <div class="col-9 posts">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                      <img src="https://i.kapital.kz/c/c1303bc7f95babae381f03ce2bf5d676/n/1280/960/5/2/e/2/9/e15c290e8b54760d24d7402143f.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Пример статьи</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam rerum consequatur, praesentium necessitatibus dicta, rem vitae dolores voluptates quia et atque molestias veniam nostrum temporibus sunt. Minus deserunt officia architecto.</p>
                        <hr />
                        <a href="#" class="btn btn-primary">Подробнее</a>
                      </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                      <img src="https://i.kapital.kz/c/c1303bc7f95babae381f03ce2bf5d676/n/1280/960/5/2/e/2/9/e15c290e8b54760d24d7402143f.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Пример статьи</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam rerum consequatur, praesentium necessitatibus dicta, rem vitae dolores voluptates quia et atque molestias veniam nostrum temporibus sunt. Minus deserunt officia architecto.</p>
                        <hr />
                        <a href="#" class="btn btn-primary">Подробнее</a>
                      </div>
                    </div>
                </div> 
              </div> 
              
              <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <div class="card">
                        <img src="https://i.kapital.kz/c/c1303bc7f95babae381f03ce2bf5d676/n/1280/960/5/2/e/2/9/e15c290e8b54760d24d7402143f.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Пример статьи</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam rerum consequatur, praesentium necessitatibus dicta, rem vitae dolores voluptates quia et atque molestias veniam nostrum temporibus sunt. Minus deserunt officia architecto.</p>
                          <hr />
                          <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                      <div class="card">
                        <img src="https://i.kapital.kz/c/c1303bc7f95babae381f03ce2bf5d676/n/1280/960/5/2/e/2/9/e15c290e8b54760d24d7402143f.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Пример статьи</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam rerum consequatur, praesentium necessitatibus dicta, rem vitae dolores voluptates quia et atque molestias veniam nostrum temporibus sunt. Minus deserunt officia architecto.</p>
                          <hr />
                          <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                      </div>
                  </div> 
                </div>
            </div>
            <div class="col-md-3 col-sm-12 category">
                <div class="card">
                  <div class="card-header">
                    Категории
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Подводные камни</li>
                    <li class="list-group-item">Рассчет перевозок</li>
                    <li class="list-group-item">Полезные советы</li>
                  </ul>
                </div>
               

                <div class="sidebar-box hidden-sm hidden-xs">
                  <div class="bio text-center">
                    <!-- <img src="static/img/man-img.jpg" alt="Image Placeholder" class="img-fluid"> -->
                    <div class="bio-body">
                      <h5>Подпишитесь на рассылку</h5>
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p> -->
                      <form action="mail.php">
                          <div class="input-group">
                            <input type="text" name="email" placeholder="Ваш email" required />
                          </div>
                          <a href="#" class="btn btn-primary btn-sm rounded">Подписаться</a>
                      </form>
                      
                      <p class="social">
                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          
        </div>
      </div>


@endsection

