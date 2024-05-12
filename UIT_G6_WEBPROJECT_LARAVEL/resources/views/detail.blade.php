<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Detail</title>
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
                <i><a title="Phim" href="/" class="fa-solid fa-magnifying-glass"></a></i>
                <a href="" style="padding: 15px">Trẻ em</a>
                <i><a title="Phim" href="/" class="fa-regular fa-bell"></a></i>
                <img class="profile-picture" src="\datasources\img\profile.jpg" alt="" />
                <div class="profile-text-container">
                    <i class="fas fa-caret-down"></i>
                </div>
            </div>
        </div>

        <!--Movie Detail-->
        <!--Movie Detail Container-->
        
        {{-- <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 ">
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
                </div>
            </div>
        </div> --}}

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 ">
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
        </div>
        




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
