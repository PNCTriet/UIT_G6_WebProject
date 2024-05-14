<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Netflop
    </title>
    <link rel="shortcut icon" type="image/png"
        href="datasources/img/netflop.png">
    <link
    <link rel="stylesheet" href="css/style_detail.css" />
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

        // Từ khóa tìm kiếm
        $query = $movie['name'];

        // URL của API của TMDB để tìm kiếm TV show
        $url = "https://api.themoviedb.org/3/search/tv?api_key=$api_key&query=" . urlencode($query);

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
            // Hiển thị backdrop
            if (!empty($show['backdrop_path'])) {
                echo '<div class="backdrop-container">';
                echo '<img class="backdrop-img" src="https://image.tmdb.org/t/p/original/' . $show['backdrop_path'] . '" alt="' . $show['name'] . '">';
                // Lấy thêm nhiều backdrop và hiển thị ngẫu nhiên mỗi lần trang được tải lại
                $backdrop_count = 5; // Số lượng backdrop muốn hiển thị
                echo '</div>';
            } else {
                echo '<p>Không có backdrop.</p>';
            }
            echo '<h1>' . $show['name'] . '</h1>';
            echo '<img src="https://image.tmdb.org/t/p/w500/' . $show['poster_path'] . '" alt="' . $show['name'] . '">';
            echo '<p><strong>Ngày phát sóng:</strong> ' . $show['first_air_date'] . '</p>';
            echo '<p><strong>Đánh giá:</strong> ' . $show['vote_average'] . '</p>';
            echo '<p><strong>Tóm tắt:</strong> ' . $show['overview'] . '</p>';
            echo '<p><strong>Ngôn ngữ gốc:</strong> ' . $show['original_language'] . '</p>';
            echo '<p><strong>Quốc gia gốc:</strong> ' . implode(', ', $show['origin_country']) . '</p>';
            echo '<p><strong>Thể loại:</strong> ' . implode(', ', $show['genre_ids']) . '</p>';
            echo '<p><strong>Populariy:</strong> ' . $show['popularity'] . '</p>';
            echo '<p><strong>Số lượt đánh giá:</strong> ' . $show['vote_count'] . '</p>';
            
            // Gọi API để lấy thông tin về video trailer
            $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
            $video_response = file_get_contents($video_url);
            $video_data = json_decode($video_response, true);

            // Kiểm tra xem có video trailer không và hiển thị nó
            if (!empty($video_data['results'])) {
                $youtube_key = $video_data['results'][0]['key'];
                echo '<div class="video-container">';
                echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            } else {
                echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
            }

            // Gọi API để lấy thông tin về diễn viên của bộ phim
            $credits_url = "https://api.themoviedb.org/3/tv/{$show['id']}/credits?api_key=$api_key";
            $credits_response = file_get_contents($credits_url);
            $credits_data = json_decode($credits_response, true);

            // Hiển thị hình diễn viên
            if (!empty($credits_data['cast'])) {
                echo '<div class="cast-container">';
                foreach ($credits_data['cast'] as $cast) {
                    $profile_path = $cast['profile_path'];
                    if ($profile_path) {
                        echo '<div class="cast-item"><img class="cast-img" src="https://image.tmdb.org/t/p/w200/' . $profile_path . '" alt="' . $cast['name'] . '"></div>';
                    }
                }
                echo '</div>';
            } else {
                echo '<p>Không tìm thấy thông tin về diễn viên cho bộ phim này.</p>';
            }
        } else {
            echo '<p>Không có kết quả.</p>';
        }
        ?>
        
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 ">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="flex items-center p-4 w-[920px]">
                        <div class="w-3/12">
                            <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}"
                                alt="Poster" class="rounded ">
                        </div>
                        <div class="w-9/12">
                            <div class="ml-5">
                                <h2 class="text-2xl text-gray-900 font-semibold mb-2">{{ $movie['name'] }}</h2>
                                <div class="flex items-center space-x-2 tracking-wide pb-1">
                                    <h1 class="text-gray-500">First Air Date</h1>
                                    <p class="leading-6 text-sm">{{ $movie['first_air_date'] }}</p>
                                </div>
                                <div class="flex items-center space-x-2 tracking-wide pb-1">
                                    <h1 class="text-gray-500">Rating</h1>
                                    <p class="leading-6 text-sm">{{ $movie['vote_average'] }}</p>
                                </div>
                                <div class="flex items-center space-x-2 tracking-wide pb-1">
                                    <h1 class="text-gray-500">Genres</h1>
                                    <p class="leading-6 text-sm">
                                        @foreach ($movie['genres'] as $genre)
                                            {{ $genre['name'] }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                                <p class="leading-6 mt-5 text-gray-500">{{ $movie['overview'] }}</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    @php
                    // Gọi API để lấy thông tin về video trailer
                    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                    $video_url = "https://api.themoviedb.org/3/tv/{$movie['id']}/videos?api_key=$api_key";
                    $video_response = file_get_contents($video_url);
                    $video_data = json_decode($video_response, true);
                    @endphp

                    <!-- Display video trailer if available -->
                    @if (!empty($video_data['results']))
                        @php $youtube_key = $video_data['results'][0]['key']; @endphp
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtube_key }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @else
                        <p>Không tìm thấy video trailer cho bộ phim này.</p>
                    @endif

                    
                    @php
                    // Gọi API để lấy thông tin về diễn viên của bộ phim
                    $credits_url = "https://api.themoviedb.org/3/tv/{$movie['id']}/credits?api_key=$api_key";
                    $credits_response = file_get_contents($credits_url);
                    $credits_data = json_decode($credits_response, true);
                    @endphp
        
                    <!-- Display cast images -->
                    @if (!empty($credits_data['cast']))
                        <div class="cast-container">
                            @foreach ($credits_data['cast'] as $cast)
                                @php $profile_path = $cast['profile_path']; @endphp
                                @if ($profile_path)
                                    <div class="cast-item"><img class="cast-img" src="https://image.tmdb.org/t/p/w200/{{ $profile_path }}" alt="{{ $cast['name'] }}"></div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p>Không tìm thấy thông tin về diễn viên cho bộ phim này.</p>
                    @endif
                </div>
            </div>
        </div> --}}
        <br></br>

        <div class="row">
            <h2>Recommened</h2>
            <div class="row-posters">
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_11.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_12.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_13.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_14.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_15.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_16.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_17.png" alt="" class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_18.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_19.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_20.png" alt=""
                    class="row-poster" />
            </div>
        </div>

        <div class="row">
            <h2>Trending</h2>
            <div class="row-posters">
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_21.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_22.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_23.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_24.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_25.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_26.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_27.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_28.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_29.png" alt=""
                    class="row-poster" />
                <img src="../datasources/filmphoto_[body]/filmphoto_[body]_30.png" alt=""
                    class="row-poster" />
            </div>
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
