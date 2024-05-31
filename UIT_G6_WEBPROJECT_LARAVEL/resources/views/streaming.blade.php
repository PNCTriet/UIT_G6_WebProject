<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="datasources/img/netflop.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        /* Watch */
        .episode-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Khoảng cách giữa các button */
        }

        .episode-button {
            font-weight: bold;
            background-color: transparent;
            border: none;
            background-color: red;
            color: rgb(253, 253, 253);
            /* Màu chữ đỏ */
            padding: 10px 20px;
            /* Kích thước button */
            border-radius: 5px;
            /* Bo tròn các góc */
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            /* Hiệu ứng hover */
            text-decoration: none;
        }

        .episode-button:hover {
            background-color: rgb(146, 22, 22);
            /* Màu nền đỏ khi hover */
            color: white;
            /* Màu chữ trắng khi hover */
        }

        .episode-button.active {
            background-color: rgb(100, 10, 10);
            /* Màu nền đậm hơn cho nút hiện tại */
            color: white;
            /* Màu chữ trắng */
        }

        .video_container h2 {
            font-size: 50px;
            color: #ffffff;
            margin-top: 10px;
            margin-bottom: 20px;
            text-align: left;
        }

        .video_container {

            margin-top: 10px;
            margin-left: 95px;
            text-align: left;
            display: flex;
            justify-content: left;
            /* Canh giữa theo chiều ngang */
            align-items: left;
            /* Canh giữa theo chiều dọc */
        }

        .video-card {
            font: 20px/28px "Lato", Arial, sans-serif;
            color: #A9A8A3;
            padding: 10px 0 20px 0;
            height: auto;
        }


        .video_streaming {
            width: 100%;
            height: 100%;
            text-align: center;
            padding-left: 10px;
            padding-right: 10px;
        }

        .video_streaming video {
            width: 90%;
            /* width: auto; */
            margin-top: 30px;
            border-radius: 5px;
            animation: slideRight 0.6s ease-in-out;
            align-self: center;
        }

        .video_streaming .trailer {
            width: 60%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
            background-image: url(../img/movie-4.jpg);
            background-position: top;
        }

        .video_streaming .trailer:nth-of-type(2) {
            background-image: url(../img/movie-2.jpg);
        }

        .video_streaming .trailer:nth-of-type(3) {
            background-image: url(../img/movie-3.jpg);
        }

        .video_containervideo {
            display: flex;
            justify-content: center;
            /* Canh giữa theo chiều ngang */
            align-items: center;
            /* Canh giữa theo chiều dọc */
        }

        video::cue {
            opacity: 1;
            background-color: rgb(233, 15, 15);
            font-size: 20px !important;
        }

        /* End Watch */
    </style>
</head>
@include('layout.user_header')

<body>
    @include('layout.user_navbar')

    <!-- Navbar -->
    <!-- Streaming Section -->
    <!-- Watch -->
    <div class="video_streaming">
        <div class="video_containervideo">
            <video controls autoplay controlsList="nodownload">
                <source src="" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="video_container">
            <?php
            //dd($movie);
            echo '<div class="video-card">';
            if ($movie['endpoint_status'] === 'mv') {
                echo '<h2>' . $movie['title'] . '</h2>';
            } else {
                echo '<h2>' . $movie['name'] . '</h2>';
            }
            echo '<fieldset class="rating">
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
                                                                                </p>
                                                            
                                                                                </div>';
            ?>
        </div>
        <div class="video_container">
            <div class="episode-buttons">
                @for ($i = 1; $i <= $movie['episode_status']; $i++)
                    <a href="?episode={{ $i }}" class="episode-button">Tập {{ $i }}</a>
                @endfor
            </div>

            <script>
                // Function to get URL parameter
                function getParameterByName(name) {
                    const urlParams = new URLSearchParams(window.location.search);
                    return urlParams.get(name);
                }

                // Event listener for when the page is unloaded
                // window.addEventListener('beforeunload', saveVideoState);

                // // Event listener for when the page is loaded
                // window.addEventListener('load', restoreVideoState);

                // Function to save video state and current episode to localStorage
                function saveVideoState() {
                    const videoElement = document.querySelector('video');
                    localStorage.setItem('videoTime', videoElement.currentTime);

                    const currentEpisode = getParameterByName('episode') || 1;
                    localStorage.setItem('currentEpisode', currentEpisode);
                }

                // Function to restore video state and episode from localStorage
                function restoreVideoState() {
                    const videoElement = document.querySelector('video');
                    const savedTime = localStorage.getItem('videoTime');
                    if (savedTime) {
                        videoElement.currentTime = parseFloat(savedTime);
                    }

                    const currentEpisode = localStorage.getItem('currentEpisode');
                    if (currentEpisode) {
                        const clickedButton = document.querySelector(`.episode-button:nth-child(${currentEpisode})`);
                        clickedButton.style.backgroundColor = 'rgb(100, 10, 10)'; // Change background color of clicked button
                    }
                }

                document.addEventListener('DOMContentLoaded', (event) => {
                    const episode = getParameterByName('episode') || 1; // Default to episode 1 if no parameter is present
                    const movieLink = "{{ $movie['movie_link'] }}";
                    const videoElement = document.querySelector('video source');

                    // Update video source based on the episode
                    videoElement.src = `${movieLink}_ep${episode}.mp4`;

                    // Reload video element to apply new source
                    videoElement.parentElement.load();

                    // Change color of clicked button
                    const buttons = document.querySelectorAll('.episode-button');
                    buttons.forEach(button => {
                        button.style.backgroundColor = 'red'; // Reset background color of all buttons
                    });
                    const clickedButton = document.querySelector(`.episode-button:nth-child(${episode})`);
                    clickedButton.style.backgroundColor = 'rgb(100, 10, 10)'; // Change background color of clicked button
                });
            </script>



        </div>
    </div>
    <!-- End Watch -->

    <!-- Footer -->
    <div class="member-footer">
        <div class="social-links">
            <a class="social-link" href=""><i class="fa-brands fa-facebook fa-xl"
                    style="color: #aaaaaa;"></i></a>
            <a class="social-link" href=""><i class="fa-brands fa-instagram fa-xl"
                    style="color: #aaaaaa;"></i></a>
            <a class="social-link" href=""><i class="fa-brands fa-twitter fa-xl" style="color: #aaaaaa;"></i></a>
            <a class="social-link" href=""><i class="fa-brands fa-youtube fa-xl" style="color: #aaaaaa;"></i></a>
        </div>
        <ul class="member-footer-links">
            <li class="member-footer-link-wrapper"><a href=""><span>Mô tả âm thanh</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Thẻ quà tặng</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Quan hệ với nhà đầu tư</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Điều khoản sử dụng</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Thông tin pháp lý</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Thông tin doanh nghiệp</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Trung tâm trợ giúp</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Trung tâm đa phương tiện</span></a>
            </li>
            <li class="member-footer-link-wrapper"><a href=""><span>Việc làm</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Quyền riêng tư</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Tuỳ chọn cookie</span></a></li>
            <li class="member-footer-link-wrapper"><a href=""><span>Liên hệ với chúng tôi</span></a></li>
        </ul>
    </div>

    <script src="js/msg_profile.js">
        //   document.getElementById('avatar').addEventListener('click', function(event) {
        //     event.preventDefault()
        //     let avatarInput =document.getElementById('avatarInput')
        //     avatarInput.click();
        //     avatarInput.addEventListener("click",()=>{
        //         let image_url =avatarInput.files[0]
        //         let create_url = URL.createObjectURL(image_url)
        //         document.getElementById('avatar').src=`${create_url}`

        //     })

        //   });
    </script>
</body>

</html>
