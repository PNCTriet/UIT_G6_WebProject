<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Netflop</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('datasources/img/netflop.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style_detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}" />
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

{{-- @include('layout.user_header') --}}

<body>
    <!--  Navbar -->


    @include('layout.user_navbar')
    <?php
    
    // API Key của bạn từ TMDB
    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
    $id = $movie['id'];
    
    // URL của API của TMDB để tìm kiếm TV show
    // https://api.themoviedb.org/3/movie/786892?api_key=123113d4a4822456c35fc67ce8dd0c16
    
    $url = "https://api.themoviedb.org/3/movie/$id?api_key=$api_key";
    
    // Khởi tạo curl
    $curl = curl_init();
    
    // Cài đặt các tùy chọn cho curl
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ]);
    
    // Gửi yêu cầu và nhận kết quả
    $response = curl_exec($curl);
    
    // Đóng curl
    curl_close($curl);
    
    // Chuyển đổi JSON thành mảng
    $data = json_decode($response, true);
    
    // Hiển thị thông tin trả về từ API
    if (isset($data)) {
        $show = $data;
        $video_url = "https://api.themoviedb.org/3/movie/{$id}/videos?api_key=$api_key";
        $video_response = file_get_contents($video_url);
        $video_data = json_decode($video_response, true);
    
        // Kiểm tra xem có video key hay không
        if (isset($video_data['results'][0]['key'])) {
            $youtube_key = $video_data['results'][0]['key'];
        } else {
            // Đặt giá trị video key mặc định
            $youtube_key = 'udSCzGAAt2E?si';
        }
        $movie = DB::table('movie')
            ->where('description', $show['id'])
            ->select('link_id')
            ->first();
    
        $buttonLabel = $movie ? 'Xem phim' : 'Opps !';
        $buttonLink = $movie ? route('streammv', $show['id']) : '#';
    
        echo '<div class="movie-card">
                <div class="container">
                    <div class="column">
                        <a href="' .
            $buttonLink .
            '">
                            <img src="https://image.tmdb.org/t/p/w200/' .
            $show['poster_path'] .
            '" alt="' .
            $show['title'] .
            '" class="cover" />
                        </a>
                        <a href="' .
            $buttonLink .
            '" class="watch-movie-button cover" style="text-align: center; font: Arial, sans-serif;">
                            <i class="fa fa-play"></i>' .
            $buttonLabel .
            '
                        </a>
                    </div>
                    <div class="hero" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' .
            $show['backdrop_path'] .
            '\');">
                        <div class="details">
                            <div class="title">' .
            $show['title'] .
            ' </div>
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" checked /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </fieldset>
                            <span class="likes">' .
            $show['vote_average'] .
            '</span>
                        </div> <!-- end details -->
                    </div> <!-- end hero -->
                    <div class="description">
                        <div class="column2">
                            <p><strong>Đánh giá:</strong> ' .
            $show['vote_average'] .
            '</p>
                            <p><strong>Tóm tắt:</strong> ' .
            $show['overview'] .
            '</p>
                            <p><strong>Ngôn ngữ gốc:</strong> ' .
            $show['original_language'] .
            '</p>
                            <p><strong>Quốc gia gốc:</strong> ' .
            implode(', ', $show['origin_country']) .
            '</p>
                            <p><strong>Populariy:</strong> ' .
            $show['popularity'] .
            '</p>
                            <p><strong>Số lượt đánh giá:</strong> ' .
            $show['vote_count'] .
            '</p>
                        </div> <!-- end column2 -->
                    </div> <!-- end description -->
                    <h2>Trailer</h2>
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/' .
            $youtube_key .
            '" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>';
    
        // Gọi API để lấy thông tin về diễn viên của bộ phim
        $credits_url = "https://api.themoviedb.org/3/movie/{$id}/credits?api_key=$api_key";
        $credits_response = file_get_contents($credits_url);
        $credits_data = json_decode($credits_response, true);
    
        echo '<br>';
        echo '<br>';
        echo '<br>';
    
        // Hiển thị hình diễn viên
        if (!empty($credits_data['cast'])) {
            echo '<h1>Diễn viên</h1>';
            echo '<div class="cast-container">';
            foreach ($credits_data['cast'] as $cast) {
                $profile_path = $cast['profile_path'];
                if ($profile_path) {
                    echo '<img class="cast-img" src="https://image.tmdb.org/t/p/w200/' .
                        $profile_path .
                        '"
                                alt="' .
                        $cast['name'] .
                        '">';
                }
            }
            echo '</div>';
        } else {
            echo '<p>Không tìm thấy thông tin về diễn viên cho bộ phim này.</p>';
        }
    } else {
        echo '<p>--Không có kết quả.</p>';
        echo '<p>--id movie : ' . $id . '</p>';
    }
    ?>
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

</body>
<script src="js/logout.js"></script>

</html>
