<!DOCTYPE html>
<html lang="en">

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

    <!-- Scripts -->
    <link rel="preload" as="style" href="http://127.0.0.1:8000/build/assets/app-Czjw7esN.css" />
    <link rel="modulepreload" href="http://127.0.0.1:8000/build/assets/app-CrG2wnyX.js" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/app-Czjw7esN.css" />
    <script type="module" src="http://127.0.0.1:8000/build/assets/app-CrG2wnyX.js"></script>
</head>

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
        <h2 style="color: white; margin-left: 20px; margin-top: 20px">Top 10 phim hot trong ngày</h2>
        <div class="number-row">
            @foreach ($movies as $moviespart)
                <div class="number-cell">
                    <span>{{ $moviespart->rank }}</span>
                    <div class="empty-cell" style="position:relative;">
                        <a href="http://127.0.0.1:8000/movies/{{ $moviespart->id }}">
                            <img src="{{ $moviespart->rank_link }}" alt="" style="height:205px">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="scroll-right">▶</button>
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
                const newLeft = currentLeft - numberCellWidth * 5.3;
                numberRow.style.left = newLeft + "px";
                if (newLeft <= -numberCellWidth * 6.3) {
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
            @foreach ($data->take(10) as $item)
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
                                    
                                    // Path to your JSON files
                                    $video_json_file = 'json/json_videos.json'; // Replace with the actual path to your video data JSON file
                                    $details_json_file = 'json/json_details.json'; // Replace with the actual path to your series details JSON file
                                    
                                    // Read the video trailer data from the JSON file
                                    $video_json_content = file_get_contents($video_json_file);
                                    $video_data_all = json_decode($video_json_content, true);
                                    
                                    // Extract the specific video data for the given series ID
                                    $video_data_key = $series_id . '_videos';
                                    $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                                    
                                    // Check if there are any video trailers and display the first one
                                    if ($video_data && !empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // No video trailer found message (if needed)   
                                    }
                                    
                                    // Read the series details from the JSON file
                                    $details_json_content = file_get_contents($details_json_file);
                                    $details_data_all = json_decode($details_json_content, true);
                                    
                                    // Extract the specific series details for the given series ID
                                    $details_data_key = $series_id . '_details';
                                    $datajson = isset($details_data_all[$details_data_key]) ? $details_data_all[$details_data_key] : null;
                                    
                                    // Display series details if data is available
                                    if ($datajson) {
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
                                        echo $datajson['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $datajson['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                    
                                        // Display genres
                                        $genre_count = count($datajson['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $datajson['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        echo '</span>';
                                    } else {
                                        // No series details found message (if needed)
                                    }
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
            @foreach ($data->skip(10)->take(10) as $item)
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
                                    
                                    // Path to your JSON files
                                    $video_json_file = 'json/json_videos.json'; // Replace with the actual path to your video data JSON file
                                    $details_json_file = 'json/json_details.json'; // Replace with the actual path to your series details JSON file
                                    
                                    // Read the video trailer data from the JSON file
                                    $video_json_content = file_get_contents($video_json_file);
                                    $video_data_all = json_decode($video_json_content, true);
                                    
                                    // Extract the specific video data for the given series ID
                                    $video_data_key = $series_id . '_videos';
                                    $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                                    
                                    // Check if there are any video trailers and display the first one
                                    if ($video_data && !empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // No video trailer found message (if needed)
                                    }
                                    
                                    // Read the series details from the JSON file
                                    $details_json_content = file_get_contents($details_json_file);
                                    $details_data_all = json_decode($details_json_content, true);
                                    
                                    // Extract the specific series details for the given series ID
                                    $details_data_key = $series_id . '_details';
                                    $datajson = isset($details_data_all[$details_data_key]) ? $details_data_all[$details_data_key] : null;
                                    
                                    // Display series details if data is available
                                    if ($datajson) {
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
                                        echo $datajson['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $datajson['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                    
                                        // Display genres
                                        $genre_count = count($datajson['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $datajson['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        echo '</span>';
                                    } else {
                                        // No series details found message (if needed)
                                    }
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
            @foreach ($data->skip(20)->take(10) as $item)
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
                                    
                                    // Path to your JSON files
                                    $video_json_file = 'json/json_videos.json'; // Replace with the actual path to your video data JSON file
                                    $details_json_file = 'json/json_details.json'; // Replace with the actual path to your series details JSON file
                                    
                                    // Read the video trailer data from the JSON file
                                    $video_json_content = file_get_contents($video_json_file);
                                    $video_data_all = json_decode($video_json_content, true);
                                    
                                    // Extract the specific video data for the given series ID
                                    $video_data_key = $series_id . '_videos';
                                    $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                                    
                                    // Check if there are any video trailers and display the first one
                                    if ($video_data && !empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // No video trailer found message (if needed)
                                    }
                                    
                                    // Read the series details from the JSON file
                                    $details_json_content = file_get_contents($details_json_file);
                                    $details_data_all = json_decode($details_json_content, true);
                                    
                                    // Extract the specific series details for the given series ID
                                    $details_data_key = $series_id . '_details';
                                    $datajson = isset($details_data_all[$details_data_key]) ? $details_data_all[$details_data_key] : null;
                                    
                                    // Display series details if data is available
                                    if ($datajson) {
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
                                        echo $datajson['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $datajson['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                    
                                        // Display genres
                                        $genre_count = count($datajson['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $datajson['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        echo '</span>';
                                    } else {
                                        // No series details found message (if needed)
                                    }
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
            @foreach ($data->skip(30)->take(10) as $item)
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
                                    
                                    // Path to your JSON files
                                    $video_json_file = 'json/json_videos.json'; // Replace with the actual path to your video data JSON file
                                    $details_json_file = 'json/json_details.json'; // Replace with the actual path to your series details JSON file
                                    
                                    // Read the video trailer data from the JSON file
                                    $video_json_content = file_get_contents($video_json_file);
                                    $video_data_all = json_decode($video_json_content, true);
                                    
                                    // Extract the specific video data for the given series ID
                                    $video_data_key = $series_id . '_videos';
                                    $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                                    
                                    // Check if there are any video trailers and display the first one
                                    if ($video_data && !empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // No video trailer found message (if needed)
                                    }
                                    
                                    // Read the series details from the JSON file
                                    $details_json_content = file_get_contents($details_json_file);
                                    $details_data_all = json_decode($details_json_content, true);
                                    
                                    // Extract the specific series details for the given series ID
                                    $details_data_key = $series_id . '_details';
                                    $datajson = isset($details_data_all[$details_data_key]) ? $details_data_all[$details_data_key] : null;
                                    
                                    // Display series details if data is available
                                    if ($datajson) {
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
                                        echo $datajson['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $datajson['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                    
                                        // Display genres
                                        $genre_count = count($datajson['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $datajson['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        echo '</span>';
                                    } else {
                                        // No series details found message (if needed)
                                    }
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
            @foreach ($data->skip(40)->take(10) as $item)
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
                                    
                                    // Path to your JSON files
                                    $video_json_file = 'json/json_videos.json'; // Replace with the actual path to your video data JSON file
                                    $details_json_file = 'json/json_details.json'; // Replace with the actual path to your series details JSON file
                                    
                                    // Read the video trailer data from the JSON file
                                    $video_json_content = file_get_contents($video_json_file);
                                    $video_data_all = json_decode($video_json_content, true);
                                    
                                    // Extract the specific video data for the given series ID
                                    $video_data_key = $series_id . '_videos';
                                    $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                                    
                                    // Check if there are any video trailers and display the first one
                                    if ($video_data && !empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // No video trailer found message (if needed)
                                    }
                                    
                                    // Read the series details from the JSON file
                                    $details_json_content = file_get_contents($details_json_file);
                                    $details_data_all = json_decode($details_json_content, true);
                                    
                                    // Extract the specific series details for the given series ID
                                    $details_data_key = $series_id . '_details';
                                    $datajson = isset($details_data_all[$details_data_key]) ? $details_data_all[$details_data_key] : null;
                                    
                                    // Display series details if data is available
                                    if ($datajson) {
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
                                        echo $datajson['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $datajson['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                    
                                        // Display genres
                                        $genre_count = count($datajson['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $datajson['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        echo '</span>';
                                    } else {
                                        // No series details found message (if needed)
                                    }
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
            @foreach ($data->skip(50)->take(10) as $item)
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
                                    
                                    // Path to your JSON files
                                    $video_json_file = 'json/json_videos.json'; // Replace with the actual path to your video data JSON file
                                    $details_json_file = 'json/json_details.json'; // Replace with the actual path to your series details JSON file
                                    
                                    // Read the video trailer data from the JSON file
                                    $video_json_content = file_get_contents($video_json_file);
                                    $video_data_all = json_decode($video_json_content, true);
                                    
                                    // Extract the specific video data for the given series ID
                                    $video_data_key = $series_id . '_videos';
                                    $video_data = isset($video_data_all[$video_data_key]) ? $video_data_all[$video_data_key] : null;
                                    
                                    // Check if there are any video trailers and display the first one
                                    if ($video_data && !empty($video_data['results'])) {
                                        $youtube_key = $video_data['results'][0]['key'];
                                        echo '<div class="video-container">';
                                        echo '<iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                                        echo '</div>';
                                    } else {
                                        // No video trailer found message (if needed)
                                    }
                                    
                                    // Read the series details from the JSON file
                                    $details_json_content = file_get_contents($details_json_file);
                                    $details_data_all = json_decode($details_json_content, true);
                                    
                                    // Extract the specific series details for the given series ID
                                    $details_data_key = $series_id . '_details';
                                    $datajson = isset($details_data_all[$details_data_key]) ? $details_data_all[$details_data_key] : null;
                                    
                                    // Display series details if data is available
                                    if ($datajson) {
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
                                        echo $datajson['vote_average'] * 10;
                                        echo '% Score</p>';
                                        echo '<span class="m-2 netflix-card-text text-white">' . $datajson['number_of_episodes'] . ' Episodes</span>';
                                        echo '<span class="border netflix-card-text p-1 text-white">HD</span>';
                                        echo '</section>';
                                        echo '<span class="netflix-card-text text-white">';
                                    
                                        // Display genres
                                        $genre_count = count($datajson['genres']);
                                        for ($i = 0; $i < min($genre_count, 3); $i++) {
                                            echo $datajson['genres'][$i]['name'];
                                            if ($i < min($genre_count, 3) - 1) {
                                                echo ' • ';
                                            }
                                        }
                                        echo '</span>';
                                    } else {
                                        // No series details found message (if needed)
                                    }
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

</html>
