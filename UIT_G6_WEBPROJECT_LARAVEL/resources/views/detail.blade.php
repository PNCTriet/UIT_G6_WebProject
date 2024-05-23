<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Netflop
    </title>
    <link rel="shortcut icon" type="image/png" href="datasources/img/netflop.png">
    </link>
    <link rel="stylesheet" href="css/style_detail.css" />
    <link rel="stylesheet" href="css/style_index.css" />
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
</head>

@include('layout.user_header')

<body>
    <!--  Navbar -->
    <div class="navbar">

        @include('layout.user_navbar')
        <?php
        // API Key của bạn từ TMDB
        $api_key = '123113d4a4822456c35fc67ce8dd0c16';
        // https://api.themoviedb.org/3/tv/215720/videos?api_key=$123113d4a4822456c35fc67ce8dd0c16
        // Từ khóa tìm kiếm
        $query = $movie['name'];
        
        // URL của API của TMDB để tìm kiếm TV show
        $url = "https://api.themoviedb.org/3/search/tv?api_key=$api_key&query=".urlencode($query);
        
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
        if (isset($data['results'][0])) {
            $show = $data['results'][0];
            $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
            $video_response = file_get_contents($video_url);
            $video_data = json_decode($video_response, true);
        
            // Kiểm tra xem có video key hay không
            if (isset($video_data['results'][0]['key'])) {
                $youtube_key = $video_data['results'][0]['key'];
            } else {
                // Đặt giá trị video key mặc định
                $youtube_key = 'udSCzGAAt2E?si';
            }
            echo '<div class="movie-card">
                                          
                                                            <div class="container">
                                                            
                                                            <a href="#"><img src="https://image.tmdb.org/t/p/w200/' .
                $show['poster_path'] .
                '" alt="' .
                $show['name'] .
                '" class="cover" /></a>
                                        
                                                            <div class="hero" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' .
                $show['backdrop_path'] .
                '\');">
                                                                    
                                                                <div class="details">
                                                                
                                                                <div class="title">' .
                $show['name'] .
                ' </div>
                                                        
                                                                    
                                                                
                                                                <fieldset class="rating">
                                                                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" checked /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                                    </fieldset>
                                                                
                                                                <span class="likes">' .
                $show['vote_average'] .
                '</span>
                                                                
                                                                </div> <!-- end details -->
                                                                
                                                            </div> <!-- end hero -->
                                                            
                                                            <div class="description">
                                                                
                                                                
                                                                <div class="column2">
                                                                
                                                                <p><strong>Ngày phát sóng:</strong> ' .
                $show['first_air_date'] .
                '</p>
                                                                <p><strong>Đánh giá:</strong> ' .
                $show['vote_average'] .
                '</p>
                                                                <p><strong>Tóm tắt:</strong> ' .
                $show['overview'] .
                '</p>
                                                                <p><strong>Ngôn ngữ gốc:</strong> ' .
                $show['original_language'] .
                '</p>
                                                                <strong>Quốc gia gốc:</strong> ' .
                implode(', ', $show['origin_country']) .
                '</p>
                                                                <p><strong>Thể loại:</strong> ' .
                implode(', ', $show['genre_ids']) .
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
                                                        </div> ';
        
            // Gọi API để lấy thông tin về diễn viên của bộ phim
            $credits_url = "https://api.themoviedb.org/3/tv/{$show['id']}/credits?api_key=$api_key";
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
                        echo '<img class="cast-img" src="https://image.tmdb.org/t/p/w200/' . $profile_path . '" alt="' . $cast['name'] . '">';
                    }
                }
                echo '</div>';
            } else {
                echo '<p>Không tìm thấy thông tin về diễn viên cho bộ phim này.</p>';
            }
        
            // // Hiển thị backdrop
            // if (!empty($show['backdrop_path'])) {
            //     echo '<div class="backdrop-container">';
            //     echo '<img class="backdrop-img" src="https://image.tmdb.org/t/p/original/' . $show['backdrop_path'] . '" alt="' . $show['name'] . '">';
            //     echo '<div class="backdrop-image" style="background-image: url("https://image.tmdb.org/t/p/original/' . $show['backdrop_path'] . '" alt="' . $show['name'] . '")"></div>';
            //     // Lấy thêm nhiều backdrop và hiển thị ngẫu nhiên mỗi lần trang được tải lại
            //     $backdrop_count = 5; // Số lượng backdrop muốn hiển thị
            //     echo '</div>';
            // } else {
            //     echo '<p>Không có backdrop.</p>';
            // }
            // echo '<h1>' . $show['name'] . '</h1>';
            // //echo '<img src="https://image.tmdb.org/t/p/w500/' . $show['poster_path'] . '" alt="' . $show['name'] . '">';
            // echo '<figure class="poster-box movie-poster">
            //         <img src="https://image.tmdb.org/t/p/w342/' . $show['poster_path'] . '" alt="' . $show['name'] . '">
            //     </figure>
            //     <div class="detail-box">
        
            //         <div class="detail-content">
            //         <h1 class="heading">' . $show['name'] . '</h1>
        
            //         <div class="meta-list">
        
            //             <div class="meta-item">
            //             <img src="./assets/images/star.png" width="20" height="20" alt="rating">
        
            //             <span class="span">'. $show['vote_average'] .'</span>
        
            //             </div>
        
            //             <div class="separator"></div>
        
            //             <div class="meta-item">${runtime}m</div>
        
            //             <div class="separator"></div>
        
            //             <div class="meta-item">' . $show['first_air_date'] . '</div>
        
            //         </div>
        
            //         <p class="genre">' . implode(', ', $show['genre_ids']) . '</p>
        
            //         <p class="overview">' . $show['overview'] . '</p>
        
            //         <ul class="detail-list">
        
            //             <div class="list-item">
            //             <p class="list-name">Starring</p>
        
            //             <p>${getCasts(cast)}</p>
            //             </div>
        
            //             <div class="list-item">
            //             <p class="list-name">Directed By</p>
        
            //             <p>${getDirectors(crew)}</p>
            //             </div>
        
            //         </ul>
        
            //         </div>
        
            //     </div>';
            // // echo '<p><strong>Ngày phát sóng:</strong> ' . $show['first_air_date'] . '</p>';
            // // echo '<p><strong>Đánh giá:</strong> ' . $show['vote_average'] . '</p>';
            // // echo '<p><strong>Tóm tắt:</strong> ' . $show['overview'] . '</p>';
            // // echo '<p><strong>Ngôn ngữ gốc:</strong> ' . $show['original_language'] . '</p>';
            // // echo '<p><strong>Quốc gia gốc:</strong> ' . implode(', ', $show['origin_country']) . '</p>';
            // // echo '<p><strong>Thể loại:</strong> ' . implode(', ', $show['genre_ids']) . '</p>';
            // // echo '<p><strong>Populariy:</strong> ' . $show['popularity'] . '</p>';
            // // echo '<p><strong>Số lượt đánh giá:</strong> ' . $show['vote_count'] . '</p>';
        
            // // Gọi API để lấy thông tin về video trailer
            // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
            // $video_response = file_get_contents($video_url);
            // $video_data = json_decode($video_response, true);
        
            // // Kiểm tra xem có video trailer không và hiển thị nó
            // if (!empty($video_data['results'])) {
            //     $youtube_key = $video_data['results'][0]['key'];
            //     echo '<div class="video-container">';
            //     echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
            //     echo '</div>';
            // } else {
            //     echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
            // }
        
            // // Gọi API để lấy thông tin về diễn viên của bộ phim
            // $credits_url = "https://api.themoviedb.org/3/tv/{$show['id']}/credits?api_key=$api_key";
            // $credits_response = file_get_contents($credits_url);
            // $credits_data = json_decode($credits_response, true);
        
            // echo '<br>';
            // echo '<br>';
            // echo '<br>';
        
            // // Hiển thị hình diễn viên
            // if (!empty($credits_data['cast'])) {
            //     echo '<div class="cast-container">';
            //     foreach ($credits_data['cast'] as $cast) {
            //         $profile_path = $cast['profile_path'];
            //         if ($profile_path) {
            //             echo '<div class="cast-item"><img class="cast-img" src="https://image.tmdb.org/t/p/w200/' . $profile_path . '" alt="' . $cast['name'] . '"></div>';
            //         }
            //     }
            //     echo '</div>';
            // } else {
            //     echo '<p>Không tìm thấy thông tin về diễn viên cho bộ phim này.</p>';
            // }
        } else {
            echo '<p>Không có kết quả.</p>';
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
    </div>
</body>
<script src="js/logout.js"></script>

</html>
