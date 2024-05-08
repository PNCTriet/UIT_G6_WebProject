<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style_index.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!--  Navbar -->
    <div class="navbar">
      <div class="navbar-container">
        <div class="logo-container">
          <h1 class="logo">Netflop</h1>
        </div>
        <div class="menu-container">
          <ul class="menu-list">
            <li class="menu-list-item">
              <a href="">Trang chủ</a>
            </li>

            <li class="menu-list-item">
              <a title="Phim" href="">Phim T.Hình</a>
            </li>
            <li class="menu-list-item"><a title="Phim" href="">Phim</a></li>
            <li class="menu-list-item">
              <a title="Phim" href="">Mới &amp Phổ biến</a>
            </li>
            <li class="menu-list-item">
              <a title="Phim" href="">Danh sách của tôi</a>
            </li>
            <li class="menu-list-item">
              <a title="Phim" href="">Duyệt tìm theo ngôn ngữ</a>
            </li>
          </ul>
        </div>
        <div class="profile-container">
          <i
            ><a title="Phim" href="./search.html" class="fa-solid fa-magnifying-glass"></a
          ></i>
          <a href="" style="padding: 15px">Trẻ em</a>
          <i><a title="Phim" href="/" class="fa-regular fa-bell"></a></i>
          <a href="codesource_demo1/profile.html" class="menu-list-item">
            <img
              class="profile-picture"
              src="datasources/img/profile.jpg"
              alt=""
            />
          </a>  
          <div class="profile-text-container">
            <i class="fas fa-caret-down"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- backround -->
    <!-- -----PART-2------ -->
    <!-- Lấy phần 2 -->
    <section class="video-section">
      <article class="video-article">
        <!-- <div class="video-detail">
                <video class="video" width="100%" autoplay muted>
                    <source type="video/mp4" class="video-source" >
                    Your browser does not support this video
                </video>
            </div> -->
      </article>
    </section>
    <!-- ---------------------------- -->
    <script src="./background.js"></script>

    <!-- RankBar -->
    <!-- <br /><br /><br /><br /><br /><br /><br /><br /><br /> -->

    <div class="overflow-container">
      <h2 style="color: white; margin-left: 20px; margin-top: 20px">
        Top 10 phim hot trong ngày
      </h2>

      <div class="number-row">
        <div class="number-cell">
          <span>1</span>
          <div class="empty-cell" style="position: relative">
            <a href="codesource_demo1/detail.html">
              <img src="datasources/imageranking/img1.png" alt="" />
            </a>
          </div>
        </div>

        <div class="number-cell">
          <span>2</span>
          <div class="empty-cell" style="position: relative">
            <a href="#">
              <img src="datasources/imageranking/img2.png" alt="" />
            </a>
          </div>
        </div>
        <div class="number-cell">
          <span>3</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img3.png" alt="" />
            </a>
          </div>
        </div>

        <div class="number-cell">
          <span>4</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img4.png" alt="" />
            </a>
          </div>
        </div>
        <div class="number-cell">
          <span>5</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img5.png" alt="" />
            </a>
          </div>
        </div>

        <div class="number-cell">
          <span>6</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img6.png" alt="" />
            </a>
          </div>
        </div>
        <div class="number-cell">
          <span>7</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img7.png" alt="" />
            </a>
          </div>
        </div>

        <div class="number-cell">
          <span>8</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img8.png" alt="" />
            </a>
          </div>
        </div>
        <div class="number-cell">
          <span>9</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img9.png" alt="" />
            </a>
          </div>
        </div>

        <div class="number-cell">
          <span>10</span>
          <div class="empty-cell" style="position: relative">
            <a href="">
              <img src="datasources/imageranking/img10.png" alt="" />
            </a>
          </div>
        </div>
        
        <!-- Repeat this structure for the rest of the images -->
      </div>
      <button class="scroll-right" >▶</button>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const numberRow = document.querySelector(".number-row");
        const scrollRightButton = document.querySelector(".scroll-right");
        const numberCellWidth =document.querySelector(".number-cell").offsetWidth;
        const arrowKeys = [37, 38, 39, 40];
        const emptycell = document.querySelectorAll(".empty-cell");
        const popup = document.querySelectorAll(".pop-up");

        emptycell.forEach(function (cell, index) {
          cell.addEventListener("mouseover", function () {
            popup[index].style.display = "block";
          });

          cell.addEventListener("mouseout", function () {
            popup[index].style.display = "none";
          });
        });
        scrollRightButton.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(numberRow).left);
          const newLeft = currentLeft - numberCellWidth * 4;
          numberRow.style.left = newLeft + "px";
          if (newLeft <= -numberCellWidth * 5) {
            numberRow.style.left = "0";
          }
        });

        document.addEventListener("keydown", function (event) {
          if (arrowKeys.includes(event.keyCode)) {
            event.preventDefault();
            if (event.keyCode === 37) {
              currentPosition--;
            } else if (event.keyCode === 39) {
              currentPosition++;
            }
            updatePosition();
          }
        });
      });
    </script>

    <!-- body -->
    <div class="row">
      <br>
      <h2>Danh sách của tôi</h2>
      <div class="row-posters" id="rowpost1">
      @foreach($data->take(10) as $item)
        <img src={{$item->poster_link}} class="row-poster">
      @endforeach
      </div>
      <button class="scroll-right-poster" id="scrollpost1" >▶</button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const rowposterwidth=document.querySelector(".row-poster").offsetWidth;
          const rowposters1 =document.getElementById('rowpost1');
          const rowposters2 =document.getElementById('rowpost2');
          const rowposters3 =document.getElementById('rowpost3');
          const rowposters4 =document.getElementById('rowpost4');
          const rowposters5 =document.getElementById('rowpost5');
          const rowposters6 =document.getElementById('rowpost6');
          const scrollRightPoster1=document.getElementById('scrollpost1');
          const scrollRightPoster2=document.getElementById('scrollpost2');
          const scrollRightPoster3=document.getElementById('scrollpost3');
          const scrollRightPoster4=document.getElementById('scrollpost4');
          const scrollRightPoster5=document.getElementById('scrollpost5');
          const scrollRightPoster6=document.getElementById('scrollpost6');

          scrollRightPoster1.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(rowposters1).left);
          const newLeft = currentLeft - rowposterwidth * 4;
          rowposters1.style.left = newLeft + "px";
          if (newLeft <= -rowposterwidth * 5) {
            rowposters1.style.left = "0";
          }
          });

          scrollRightPoster2.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(rowposters2).left);
          const newLeft = currentLeft - rowposterwidth * 4;
          rowposters2.style.left = newLeft + "px";
          if (newLeft <= -rowposterwidth * 5) {
            rowposters2.style.left = "0";
          }
          });

          scrollRightPoster3.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(rowposters3).left);
          const newLeft = currentLeft - rowposterwidth * 4;
          rowposters3.style.left = newLeft + "px";
          if (newLeft <= -rowposterwidth * 5) {
            rowposters3.style.left = "0";
          }
          });

          scrollRightPoster4.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(rowposters4).left);
          const newLeft = currentLeft - rowposterwidth * 4;
          rowposters4.style.left = newLeft + "px";
          if (newLeft <= -rowposterwidth * 5) {
            rowposters4.style.left = "0";
          }
          });

          scrollRightPoster5.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(rowposters5).left);
          const newLeft = currentLeft - rowposterwidth * 4;
          rowposters5.style.left = newLeft + "px";
          if (newLeft <= -rowposterwidth * 5) {
            rowposters5.style.left = "0";
          }
          });

          scrollRightPoster6.addEventListener("click", function () {
          const currentLeft = parseFloat(getComputedStyle(rowposters6).left);
          const newLeft = currentLeft - rowposterwidth * 4;
          rowposters6.style.left = newLeft + "px";
          if (newLeft <= -rowposterwidth * 5) {
            rowposters6.style.left = "0";
          }
          });
        })
    </script>

    <div class="row">
      <h2>Danh sách tiếp tục xem</h2>
      <div class="row-posters" id="rowpost2">
        @foreach($data->skip(10)->take(10) as $item)
            <img src="{{ $item->poster_link }}" class="row-poster">
        @endforeach
        
      </div>
      <button class="scroll-right-poster" id="scrollpost2">▶</button>
    </div>

    <div class="row">
      <h2>Hiện đang thịnh hành</h2>
      <div class="row-posters" id="rowpost3">
        @foreach($data->skip(20)->take(10) as $item)
            <img src="{{ $item->poster_link }}" class="row-poster">
        @endforeach
      </div>
      <button class="scroll-right-poster" id="scrollpost3">▶</button>
    </div>

    <div class="row">
      <h2>Phim truyền hình lãng mạng</h2>
      <div class="row-posters" id="rowpost4">
        @foreach($data->skip(30)->take(10) as $item)
            <img src="{{ $item->poster_link }}" class="row-poster">
        @endforeach
      </div>
      <button class="scroll-right-poster" id="scrollpost4">▶</button>
    </div>

    <div class="row">
      <h2>Phim truyền hình Trung Quốc lãng mạng</h2>
      <div class="row-posters" id="rowpost5">
        @foreach($data->skip(40)->take(10) as $item)
            <img src="{{ $item->poster_link }}" class="row-poster">
        @endforeach
      </div>
      <button class="scroll-right-poster" id="scrollpost5">▶</button>
    </div>

    <div class="row">
      <h2>Phim truyền hình giành giải thưởng châu Á</h2>
      <div class="row-posters" id="rowpost6">
        @foreach($data->skip(50)->take(10) as $item)
            <img src="{{ $item->poster_link }}" class="row-poster">
        @endforeach
      </div>
      <button class="scroll-right-poster" id="scrollpost6">▶</button>
    </div>


    <!-- footer -->
    <div class="member-footer">
      <div class="social-links">
        <a class="social-link" href="">
          <i class="fa-brands fa-facebook fa-xl" style="color: #aaaaaa"></i>
        </a>
        <a class="social-link" href="">
          <i class="fa-brands fa-instagram fa-xl" style="color: #aaaaaa"></i>
        </a>
        <a class="social-link" href="">
          <i class="fa-brands fa-twitter fa-xl" style="color: #aaaaaa"></i>
        </a>
        <a class="social-link" href="">
          <i class="fa-brands fa-youtube fa-xl" style="color: #aaaaaa"></i>
        </a>
      </div>
      <ul class="member-footer-links">
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Mô tả âm thanh</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Thẻ quà tặng</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Quan hệ với nhà đầu tư</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Điều khoản sử dụng</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Thông tin pháp lý</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Thông tin doanh nghiệp</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Trung tâm trợ giúp</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Trung tâm đa phương tiện</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Việc làm</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Quyền riêng tư</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Tuỳ chọn cookie</span>
          </a>
        </li>
        <li class="member-footer-link-wrapper">
          <a href="">
            <span>Liên hệ với chúng tôi</span>
          </a>
        </li>
      </ul>
    </div>
  </body>
</html>