<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Netflop</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('datasources/img/netflop.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style_detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}" />
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
    <style>
        .movie-card {
            font: 14px/22px "Lato", Arial, sans-serif;
            color: #A9A8A3;
            padding: 40px 0 100px 0;
            height: auto;
        }

        .watch-movie-button {
            background-color: #ff0000;
            /* Màu nền của nút */
            color: #ffffff;
            /* Màu chữ của nút */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-flex;
            padding: 10px 20px;
            position: absolute;
            margin-top: 320px;
            width: 25%;
            font-size: 20px;
            text-align: center;
            font-weight: lighter;
            align-items: center;

        }

        .watch-movie-button:hover {
            background-color: #cc0000;
            /* Màu nền khi hover */
            color: #ffffff !important;
        }
    </style>
</head>

@include('layout.user_header')

<body>
    <!--  Navbar -->
    <div class="navbar">

        @include('layout.user_navbar')
        <main style="color: white" class="main-detail">
            <div class="manga-container">
                <div class="manga-header">
                  <img src="{{$manga->thumb}}" alt="Shy Cover" class="manga-cover">
                  <div class="manga-info">
                    <h1 class="manga-title">{{$manga->title}}</h1>
                    <button class="read-now">📖 Đọc ngay</button>
                    <button class="bookmark">💾 Thêm vào danh sách yêu thích</button>
                    <div class="genres">
                      <p>Thể loại :</p>
                      <span class="genre">Action</span>
                      <span class="genre">Drama</span>
                      <span class="genre">Fantasy</span>
                      <span class="genre">{{$genre_name}}</span>
                      
                    </div>
                    <p class="description">
                        {{$manga->description}}
                        <a href="#" class="read-more">Đọc thêm</a>
                    </p>
                    <div class="details">
                        <div><strong>🗂️ Danh mục:</strong> Truyện tranh</div>
                        <div><strong>📅 Ngày tạo:</strong>{{$manga->updated_at}}</div>
                        <div><strong>👁️ Lượt xem:</strong> 18,088</div>
                        <div><strong>⭐ Đánh giá:</strong> 0.0 (0 đánh giá)</div>
                    </div>
                  </div>
                </div>
                
                <div class="rating">
                  <h3>Đánh giá của bạn</h3>
                  <div class="rating-options">
                    <button class="rating-btn">😐 Chán</button>
                    <button class="rating-btn">🙂 Hay</button>
                    <button class="rating-btn">😍 Tuyệt vời</button>
                  </div>
                </div>
            </div>
            <div class="detail-container">
                <!-- Left Section -->
                <div class="chapter-list">
                  <h2>Danh sách chương</h2>
                  <div class="tab-menu">
                    <button class="tab active">Mới nhất</button>
                    <button class="tab">Cũ nhất</button>
                  </div>
                  <div class="chapters">
                    <div class="chapter">
                      <span>📄 Chương 107</span>
                      <button class="read-btn">📖 Read</button>
                    </div>
                    <div class="chapter">
                      <span>📄 Chương 106</span>
                      <button class="read-btn">📖 Read</button>
                    </div>
                    <div class="chapter">
                      <span>📄 Chương 105</span>
                      <button class="read-btn">📖 Read</button>
                    </div>
                    <div class="chapter">
                      <span>📄 Chương 104</span>
                      <button class="read-btn">📖 Read</button>
                    </div>
                    <!-- Add more chapters as needed -->
                  </div>
                  <div class="pagination">1</div>
                </div>
            
                <!-- Right Section -->
                <div class="sidebar_detail">
                  <h3>Thể loại</h3>
                  <div class="tags">
                    <span class="tag latest-updated">⚡ Latest Updated</span>
                    <span class="tag new-release">✨ New Release</span>
                    <span class="tag most-viewed">🔥 Most Viewed</span>
                    <span class="tag completed">✔ Completed</span>
                    <span class="tag">16+</span>
                    <span class="tag">Action</span>
                    <span class="tag">Drama</span>
                    <span class="tag">Fantasy</span>
                    <span class="tag">Historical</span>
                    <!-- Add more tags as needed -->
                    <a href="#" class="more-tags">+ Xem thêm</a>
                  </div>
                  <h3>Có thể bạn sẽ thích</h3>
                  <div class="recommendations">
                    <div class="recommendation">
                      <img src="image1.jpg" alt="Cuồng Long Kiếm Thần">
                      <div>
                        <h4>Cuồng Long Kiếm Thần</h4>
                        <p>Action, Manhwa</p>
                        <span>3,990 lượt xem</span>
                      </div>
                    </div>
                    <div class="recommendation">
                      <img src="image2.jpg" alt="Raising Hell">
                      <div>
                        <h4>Raising Hell: Khúc Ca Nổi Loạn</h4>
                        <p>Manga, Mystery</p>
                        <span>1,863 lượt xem</span>
                      </div>
                    </div>
                    <!-- Add more recommendations as needed -->
                  </div>
                </div>
            </div>
        </main>
       
        <br></br>

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
    </div>
</body>
<script src="js/logout.js"></script>

</html>
