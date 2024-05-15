<!DOCTYPE html>
<html lang="en">

@include('layout.user_header')

<body>
    <!-- nav bar -->
    @include('layout.user_navbar')
    {{-- @section('navbar')
        @include('layout.user_navbar')
    @endsection --}}
    <!-- backround -->
    <!-- -----PART-2------ -->
    <!-- Lấy phần 2 -->
    <section class="video-section">
        <article class="video-article">
            <div class="video-detail">
                <video class="video" width="100%" autoplay muted>
                    <source type="video/mp4" class="video-source">
                    Your browser does not support this video
                </video>
            </div>
        </article>
    </section>
    <!-- ---------------------------- -->
    <script src="js/backround.js"></script>
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
                    <a href="#">
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
        <button class="scroll-right">></button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const numberRow = document.querySelector(".number-row");
            const scrollRightButton = document.querySelector(".scroll-right");
            const numberCellWidth = document.querySelector(".number-cell").offsetWidth;
            const arrowKeys = [37, 38, 39, 40];
            const emptycell = document.querySelectorAll(".empty-cell");
            const popup = document.querySelectorAll(".pop-up");

            emptycell.forEach(function(cell, index) {
                cell.addEventListener("mouseover", function() {
                    popup[index].style.display = "block";
                });

                cell.addEventListener("mouseout", function() {
                    popup[index].style.display = "none";
                });
            });
            scrollRightButton.addEventListener("click", function() {
                const currentLeft = parseFloat(getComputedStyle(numberRow).left);
                const newLeft = currentLeft - numberCellWidth * 4;
                numberRow.style.left = newLeft + "px";
                if (newLeft <= -numberCellWidth * 5) {
                    numberRow.style.left = "0";
                }
            });

            document.addEventListener("keydown", function(event) {
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
        <h2>Danh sách của tôi</h2>
        <div class="row-posters" id="rowpost1">
            @foreach ($movie_link->take(10) as $item)
                <section class="d-flex">
                    <div class="card">
                        <img src="{{ $item->poster_link }}" class="row-poster"
                            onclick="redirectTo('{{ route('movies.redirect', $item->id) }}')">
                        <div class="card-body">
                            <section class="d-flex align-items-center">
                                <div>
                                    <?php
                                    // API Key của bạn từ TMDB
                                    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                                    
                                    // ID của series
                                    $series_id = $item->movie_api;
                                    
                                    // Gọi API để lấy thông tin về video trailer
                                    // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
                                    $video_url = "https://api.themoviedb.org/3/tv/{$series_id}/videos?api_key=$api_key";
                                    $video_response = file_get_contents($video_url);
                                    $video_data = json_decode($video_response, true);
                                    
                                    // Kiểm tra xem có video trailer không và hiển thị nó
                                    if (!empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        // echo '<iframe class="videocontainer" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen autoplay></iframe>';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
                                    }
                                    
                                    // URL của API của TMDB để lấy thông tin chi tiết của series
                                    $url = "https://api.themoviedb.org/3/tv/{$series_id}?api_key={$api_key}";
                                    
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
                                    
                                    echo '<section class="d-flex justify-content-between">';
                                    echo '<div>';
                                    echo '<i class="bi bi-play-circle-fill card-icon"></i>';
                                    echo '<i class="bi bi-plus-circle card-icon"></i>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo(\'' . route('movies.redirect', $item->id) . '\')"></i>';
                                    echo '</div>';
                                    echo '</section>';
                                    echo '<section class="d-flex align-items-center justify-content-between">';
                                    echo '<p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">';
                                    echo $data['vote_average'] * 10;
                                    echo '% Score</p>';
                                    echo '<span class="m-2 netflix-card-text text-white">' . $data['number_of_episodes'] . ' Episodes</span>';
                                    echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                    echo '</section>';
                                    echo '<span class="netflix-card-text text-white">';
                                    //echo '<p>';
                                    $genre_count = count($data['genres']);
                                    for ($i = 0; $i < min($genre_count, 3); $i++) {
                                        echo $data['genres'][$i]['name'];
                                        if ($i < min($genre_count, 3) - 1) {
                                            echo ' • ';
                                        }
                                    }
                                    //echo '</p>';
                                    echo '</span>';
                                    ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <button class="scroll-right-poster" id="scrollpost1">></button>
    </div>


    <div class="row">
        <h2>Danh sách tiếp tục xem</h2>
        <div class="row-posters" id="rowpost2">
            @foreach ($movie_link->skip(10)->take(10) as $item)
                <section class="d-flex">
                    <div class="card">
                        <img src="{{ $item->poster_link }}" class="row-poster"
                            onclick="redirectTo('{{ route('movies.redirect', $item->id) }}')">
                            <div class="card-body">
                                <section class="d-flex align-items-center">
                                    <div>
                                        <?php
                                        // API Key của bạn từ TMDB
                                        $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                                        
                                        // ID của series
                                        $series_id = $item->movie_api;
                                        
                                        // Gọi API để lấy thông tin về video trailer
                                        // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
                                        $video_url = "https://api.themoviedb.org/3/tv/{$series_id}/videos?api_key=$api_key";
                                        $video_response = file_get_contents($video_url);
                                        $video_data = json_decode($video_response, true);
                                        
                                        // Kiểm tra xem có video trailer không và hiển thị nó
                                        if (!empty($video_data['results'])) {
                                            $youtube_key = $video_data['results'][0]['key'];
                                            echo '<div class="video-container">';
                                            // echo '<iframe class="videocontainer" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen autoplay></iframe>';
                                            echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                            echo '</div>';
                                        } else {
                                            // echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
                                        }
                                        
                                        // URL của API của TMDB để lấy thông tin chi tiết của series
                                        $url = "https://api.themoviedb.org/3/tv/{$series_id}?api_key={$api_key}";
                                        
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
                                        
                                        echo '<section class="d-flex justify-content-between">';
                                        echo '<div>';
                                        echo '<i class="bi bi-play-circle-fill card-icon"></i>';
                                        echo '<i class="bi bi-plus-circle card-icon"></i>';
                                        echo '</div>';
                                        echo '<div>';
                                        echo '<i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo(\'' . route('movies.redirect', $item->id) . '\')"></i>';
                                        echo '</div>';
                                        echo '</section>';
                                        echo '<section class="d-flex align-items-center justify-content-between">';
                                        echo '<p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">';
                                        echo $data['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $data['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                        //echo '<p>';
                                        $genre_count = count($data['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $data['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        //echo '</p>';
                                        echo '</span>';
                                        ?>
                                    </div>
                                </section>
                            </div>
                    </div>
                </section>
            @endforeach
        </div>
        <button class="scroll-right-poster" id="scrollpost2">></button>
    </div>
    <div class="row">
        <h2>Hiện đang thịnh hành</h2>
        <div class="row-posters" id="rowpost3">
            @foreach ($movie_link->skip(20)->take(10) as $item)
                <section class="d-flex">
                    <div class="card">
                        <img src="{{ $item->poster_link }}" class="row-poster"
                            onclick="redirectTo('{{ route('movies.redirect', $item->id) }}')">
                       <div class="card-body">
                            <section class="d-flex align-items-center">
                                <div>
                                    <?php
                                    // API Key của bạn từ TMDB
                                    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                                    
                                    // ID của series
                                    $series_id = $item->movie_api;
                                    
                                    // Gọi API để lấy thông tin về video trailer
                                    // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
                                    $video_url = "https://api.themoviedb.org/3/tv/{$series_id}/videos?api_key=$api_key";
                                    $video_response = file_get_contents($video_url);
                                    $video_data = json_decode($video_response, true);
                                    
                                    // Kiểm tra xem có video trailer không và hiển thị nó
                                    if (!empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        // echo '<iframe class="videocontainer" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen autoplay></iframe>';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
                                    }
                                    
                                    // URL của API của TMDB để lấy thông tin chi tiết của series
                                    $url = "https://api.themoviedb.org/3/tv/{$series_id}?api_key={$api_key}";
                                    
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
                                    
                                    echo '<section class="d-flex justify-content-between">';
                                    echo '<div>';
                                    echo '<i class="bi bi-play-circle-fill card-icon"></i>';
                                    echo '<i class="bi bi-plus-circle card-icon"></i>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo(\'' . route('movies.redirect', $item->id) . '\')"></i>';
                                    echo '</div>';
                                    echo '</section>';
                                    echo '<section class="d-flex align-items-center justify-content-between">';
                                    echo '<p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">';
                                    echo $data['vote_average'] * 10;
                                    echo '% Score</p>';
                                    echo '<span class="m-2 netflix-card-text text-white">' . $data['number_of_episodes'] . ' Episodes</span>';
                                    echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                    echo '</section>';
                                    echo '<span class="netflix-card-text text-white">';
                                    //echo '<p>';
                                    $genre_count = count($data['genres']);
                                    for ($i = 0; $i < min($genre_count, 3); $i++) {
                                        echo $data['genres'][$i]['name'];
                                        if ($i < min($genre_count, 3) - 1) {
                                            echo ' • ';
                                        }
                                    }
                                    //echo '</p>';
                                    echo '</span>';
                                    ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <button class="scroll-right-poster" id="scrollpost3">></button>
    </div>
    <div class="row">
        <h2>Phim truyền hình lãng mạng</h2>
        <div class="row-posters" id="rowpost4">
            @foreach ($movie_link->skip(30)->take(10) as $item)
                <section class="d-flex">
                    <div class="card">
                        <img src="{{ $item->poster_link }}" class="row-poster"
                            onclick="redirectTo('{{ route('movies.redirect', $item->id) }}')">
                       <div class="card-body">
                            <section class="d-flex align-items-center">
                                <div>
                                    <?php
                                    // API Key của bạn từ TMDB
                                    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                                    
                                    // ID của series
                                    $series_id = $item->movie_api;
                                    
                                    // Gọi API để lấy thông tin về video trailer
                                    // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
                                    $video_url = "https://api.themoviedb.org/3/tv/{$series_id}/videos?api_key=$api_key";
                                    $video_response = file_get_contents($video_url);
                                    $video_data = json_decode($video_response, true);
                                    
                                    // Kiểm tra xem có video trailer không và hiển thị nó
                                    if (!empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        // echo '<iframe class="videocontainer" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen autoplay></iframe>';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
                                    }
                                    
                                    // URL của API của TMDB để lấy thông tin chi tiết của series
                                    $url = "https://api.themoviedb.org/3/tv/{$series_id}?api_key={$api_key}";
                                    
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
                                    
                                    echo '<section class="d-flex justify-content-between">';
                                    echo '<div>';
                                    echo '<i class="bi bi-play-circle-fill card-icon"></i>';
                                    echo '<i class="bi bi-plus-circle card-icon"></i>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo(\'' . route('movies.redirect', $item->id) . '\')"></i>';
                                    echo '</div>';
                                    echo '</section>';
                                    echo '<section class="d-flex align-items-center justify-content-between">';
                                    echo '<p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">';
                                    echo $data['vote_average'] * 10;
                                    echo '% Score</p>';
                                    echo '<span class="m-2 netflix-card-text text-white">' . $data['number_of_episodes'] . ' Episodes</span>';
                                    echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                    echo '</section>';
                                    echo '<span class="netflix-card-text text-white">';
                                    //echo '<p>';
                                    $genre_count = count($data['genres']);
                                    for ($i = 0; $i < min($genre_count, 3); $i++) {
                                        echo $data['genres'][$i]['name'];
                                        if ($i < min($genre_count, 3) - 1) {
                                            echo ' • ';
                                        }
                                    }
                                    //echo '</p>';
                                    echo '</span>';
                                    ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <button class="scroll-right-poster" id="scrollpost4">></button>
    </div>
    <div class="row">
        <h2>Phim truyền hình Trung Quốc lãng mạng</h2>
        <div class="row-posters" id="rowpost5">
            @foreach ($movie_link->skip(40)->take(10) as $item)
                <section class="d-flex">
                    <div class="card">
                        <img src="{{ $item->poster_link }}" class="row-poster"
                            onclick="redirectTo('{{ route('movies.redirect', $item->id) }}')">
                       <div class="card-body">
                            <section class="d-flex align-items-center">
                                <div>
                                    <?php
                                    // API Key của bạn từ TMDB
                                    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                                    
                                    // ID của series
                                    $series_id = $item->movie_api;
                                    
                                    // Gọi API để lấy thông tin về video trailer
                                    // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
                                    $video_url = "https://api.themoviedb.org/3/tv/{$series_id}/videos?api_key=$api_key";
                                    $video_response = file_get_contents($video_url);
                                    $video_data = json_decode($video_response, true);
                                    
                                    // Kiểm tra xem có video trailer không và hiển thị nó
                                    if (!empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        // echo '<iframe class="videocontainer" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen autoplay></iframe>';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
                                    }
                                    
                                    // URL của API của TMDB để lấy thông tin chi tiết của series
                                    $url = "https://api.themoviedb.org/3/tv/{$series_id}?api_key={$api_key}";
                                    
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
                                    
                                    echo '<section class="d-flex justify-content-between">';
                                    echo '<div>';
                                    echo '<i class="bi bi-play-circle-fill card-icon"></i>';
                                    echo '<i class="bi bi-plus-circle card-icon"></i>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo(\'' . route('movies.redirect', $item->id) . '\')"></i>';
                                    echo '</div>';
                                    echo '</section>';
                                    echo '<section class="d-flex align-items-center justify-content-between">';
                                    echo '<p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">';
                                    echo $data['vote_average'] * 10;
                                    echo '% Score</p>';
                                    echo '<span class="m-2 netflix-card-text text-white">' . $data['number_of_episodes'] . ' Episodes</span>';
                                    echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                    echo '</section>';
                                    echo '<span class="netflix-card-text text-white">';
                                    //echo '<p>';
                                    $genre_count = count($data['genres']);
                                    for ($i = 0; $i < min($genre_count, 3); $i++) {
                                        echo $data['genres'][$i]['name'];
                                        if ($i < min($genre_count, 3) - 1) {
                                            echo ' • ';
                                        }
                                    }
                                    //echo '</p>';
                                    echo '</span>';
                                    ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <button class="scroll-right-poster" id="scrollpost5">></button>
    </div>
    <div class="row">
        <h2>Phim truyền hình giành giải thưởng châu Á</h2>
        <div class="row-posters" id="rowpost6">
            @foreach ($movie_link->skip(50)->take(10) as $item)
                <section class="d-flex">
                    <div class="card">
                        <img src="{{ $item->poster_link }}" class="row-poster"
                            onclick="redirectTo('{{ route('movies.redirect', $item->id) }}')">
                       <div class="card-body">
                            <section class="d-flex align-items-center">
                                <div>
                                    <?php
                                    // API Key của bạn từ TMDB
                                    $api_key = '123113d4a4822456c35fc67ce8dd0c16';
                                    
                                    // ID của series
                                    $series_id = $item->movie_api;
                                    
                                    // Gọi API để lấy thông tin về video trailer
                                    // $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
                                    $video_url = "https://api.themoviedb.org/3/tv/{$series_id}/videos?api_key=$api_key";
                                    $video_response = file_get_contents($video_url);
                                    $video_data = json_decode($video_response, true);
                                    
                                    // Kiểm tra xem có video trailer không và hiển thị nó
                                    if (!empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        // echo '<iframe class="videocontainer" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen autoplay></iframe>';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
                                    }
                                    
                                    // URL của API của TMDB để lấy thông tin chi tiết của series
                                    $url = "https://api.themoviedb.org/3/tv/{$series_id}?api_key={$api_key}";
                                    
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
                                    
                                    echo '<section class="d-flex justify-content-between">';
                                    echo '<div>';
                                    echo '<i class="bi bi-play-circle-fill card-icon"></i>';
                                    echo '<i class="bi bi-plus-circle card-icon"></i>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo(\'' . route('movies.redirect', $item->id) . '\')"></i>';
                                    echo '</div>';
                                    echo '</section>';
                                    echo '<section class="d-flex align-items-center justify-content-between">';
                                    echo '<p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">';
                                    echo $data['vote_average'] * 10;
                                    echo '% Score</p>';
                                    echo '<span class="m-2 netflix-card-text text-white">' . $data['number_of_episodes'] . ' Episodes</span>';
                                    echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                    echo '</section>';
                                    echo '<span class="netflix-card-text text-white">';
                                    //echo '<p>';
                                    $genre_count = count($data['genres']);
                                    for ($i = 0; $i < min($genre_count, 3); $i++) {
                                        echo $data['genres'][$i]['name'];
                                        if ($i < min($genre_count, 3) - 1) {
                                            echo ' • ';
                                        }
                                    }
                                    //echo '</p>';
                                    echo '</span>';
                                    ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <button class="scroll-right-poster" id="scrollpost6">></button>
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
            const newLeft = currentLeft - rowposterwidth * 4;
            rowposters1.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters1.style.left = "0";
            }
        });

        scrollRightPoster2.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters2).left);
            const newLeft = currentLeft - rowposterwidth * 4;
            rowposters2.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters2.style.left = "0";
            }
        });

        scrollRightPoster3.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters3).left);
            const newLeft = currentLeft - rowposterwidth * 4;
            rowposters3.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters3.style.left = "0";
            }
        });

        scrollRightPoster4.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters4).left);
            const newLeft = currentLeft - rowposterwidth * 4;
            rowposters4.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters4.style.left = "0";
            }
        });

        scrollRightPoster5.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters5).left);
            const newLeft = currentLeft - rowposterwidth * 4;
            rowposters5.style.left = newLeft + "px";
            if (newLeft <= -rowposterwidth * 5) {
                rowposters5.style.left = "0";
            }
        });

        scrollRightPoster6.addEventListener("click", function() {
            const currentLeft = parseFloat(getComputedStyle(rowposters6).left);
            const newLeft = currentLeft - rowposterwidth * 4;
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

</html>
