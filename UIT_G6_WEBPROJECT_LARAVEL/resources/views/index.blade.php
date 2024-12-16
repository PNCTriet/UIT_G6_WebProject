<!DOCTYPE html>
<html lang="en">
<?php

?>

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Netflop
    </title>
    <link rel="shortcut icon" type="image/png" href="datasources/img/netflop.png">
    <link>
    <link rel="stylesheet" href="css/style_index.css" />
    <link rel="stylesheet" href="css/style_animation.css" />
    <link rel="stylesheet" href="{{asset('css/custom_web.css')}}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    <link rel="preload" as="style" href="http://127.0.0.1:8000/build/assets/app-Czjw7esN.css" />
    <link rel="modulepreload" href="http://127.0.0.1:8000/build/assets/app-CrG2wnyX.js" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/app-Czjw7esN.css" />
    <script type="module" src="http://127.0.0.1:8000/build/assets/app-CrG2wnyX.js"></script>
    
</head>

<body>
    <!-- nav bar -->
    @include('layout.user_navbar')
    
    {{-- banner --}}
    <div class="manga-banner">
        <div class="banner-content">
          <h4>Chương 3775 [Mới]</h4>
          <h1>Võ Luyện Đỉnh Phong</h1>
          <p>
            Võ đạo đỉnh phong, là cô độc, là tịch mịch, là dài dằng dặc cầu tác, là cao xử bất thắng hàn.
            Phát triển trong nghịch cảnh, cầu sinh nơi tuyệt địa, bất khuất không buông tha, mới...
          </p>
          <div class="tags">
            <span class="tag">Shounen</span>
            <span class="tag">Supernatural</span>
            <span class="tag">Truyện Màu</span>
          </div>
          <div class="buttons">
            <button class="btn btn-primary">Đọc ngay</button>
            <button class="btn btn-secondary">Thông tin</button>
          </div>
        </div>
        <div class="banner-image">
            <img src="../uploads/manga-shounen.jpg" alt="Manga Cover">
        </div>
    </div>
   
    
    <script src="js/backround.js"></script>
    {{-- slider đề xuất --}}
    <div class="slider-container">
        <button class="arrow left"  id="leftArrow">&lt;</button>
        <div class="slider" id="slider">
            <div class="manga-card">
                <img src="https://via.placeholder.com/200x300" draggable="false" alt="Manga 1">
                <div class="info">
                    <div class="title">Ta Trở Sinh Đã Là Nhân ...</div>
                    <div class="details">Chapter 239 · 1 tuần trước</div>
                </div>
            </div>
            <div class="manga-card">
                <img src="https://via.placeholder.com/200x300" draggable="false" alt="Manga 2">
                <div class="info">
                    <div class="title">Thể Thao Cực Hạn</div>
                    <div class="details">Chapter 489 · 9 tháng trước</div>
                </div>
            </div>
            <div class="manga-card">
                <img src="https://via.placeholder.com/200x300" draggable="false" alt="Manga 3">
                <div class="info">
                    <div class="title">Cuộc Hôn Nhân Vụ Lợi</div>
                    <div class="details">Chapter 119 · 7 tháng trước</div>
                </div>
            </div>
            <div class="manga-card">
                <img src="https://via.placeholder.com/200x300" draggable="false" alt="Manga 4">
                <div class="info">
                    <div class="title">Ta Bị Kẹt Cùng Một Ngày</div>
                    <div class="details">Chapter 124 · 1 tháng trước</div>
                </div>
            </div>
            <div class="manga-card">
                <img src="https://via.placeholder.com/200x300" draggable="false" alt="Manga 5">
                <div class="info">
                    <div class="title">Ái Phi, Dao Của Nàng Rở...</div>
                    <div class="details">Chapter 97 · 2 tuần trước</div>
                </div>
            </div>
        </div>
        <button class="arrow right" id="rightArrow">&gt;</button>
    </div>
    <!-- body -->
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-warning">Truyện tranh HOT đọc nhiều nhất</h2>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <a href="/manga/{{$data[0]->id}}" class="card">
                                    <img src="{{$data[0]->thumb}}" class="card-img-top" alt="Manga 1">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{$data[0]->title}}</h5>
                                        <p class="card-text">Chapter 42</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Manga 2">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Đại Quản Gia Là Ma Hoàng</h5>
                                        <p class="card-text">Chapter 633</p>
                                    </div>
                                </div>
                            </div>
                        <!-- Add more manga items as needed -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                      <h3 class="card-title text-warning">Top Tháng</h3>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                          <span class="ranking-number me-3">01</span>
                          <span>Đại Quản Gia Là Ma Hoàng</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                          <span class="ranking-number me-3">02</span>
                          <span>Cao Võ: Hạ Cánh Đến Một Vạn Năm Sau</span>
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
  

    <!-- nav bar -->
    @include('layout.user_footer');
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rowposterwidth = document.querySelector(".row-poster").offsetWidth;
        const rowposters1 = document.getElementById('rowpost1');
        const rowposters2 = document.getElementById('rowpost2');
        const rowposters3 = document.getElementById('rowpost3');
        const rowposters4 = document.getElementById('rowpost4');
        const rowposters5 = document.getElementById('rowpost5');
        const rowposters6 = document.getElementById('rowpost6');
        const scrollRightPoster1 = document.getElementById('scrollpost1');
        const scrollRightPoster2 = document.getElementById('scrollpost2');
        const scrollRightPoster3 = document.getElementById('scrollpost3');
        const scrollRightPoster4 = document.getElementById('scrollpost4');
        const scrollRightPoster5 = document.getElementById('scrollpost5');
        const scrollRightPoster6 = document.getElementById('scrollpost6');

        scrollRightPoster1.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters1).left);
            const newLeft = currentLeft - rowposterwidth * 3.5;
            rowposters1.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters1.style.left = "0";
            }
        });

        scrollRightPoster2.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters2).left);
            const newLeft = currentLeft - rowposterwidth * 3.5;
            rowposters2.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters2.style.left = "0";
            }
        });

        scrollRightPoster3.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters3).left);
            const newLeft = currentLeft - rowposterwidth * 3.5;
            rowposters3.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters3.style.left = "0";
            }
        });

        scrollRightPoster4.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters4).left);
            const newLeft = currentLeft - rowposterwidth * 3.5;
            rowposters4.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters4.style.left = "0";
            }
        });

        scrollRightPoster5.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters5).left);
            const newLeft = currentLeft - rowposterwidth * 3.5;
            rowposters5.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters5.style.left = "0";
            }
        });

        scrollRightPoster6.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters6).left);
            const newLeft = currentLeft - rowposterwidth * 3.5;
            rowposters6.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters6.style.left = "0";
            }
        });
    })

    function redirectTo(url) {
        window.location.href = url;
    }
</script>
<script src="js/logout.js"></script>
<script src="js/script.js"></script>
<script src="js/manga.js" defer></script>

</html>
