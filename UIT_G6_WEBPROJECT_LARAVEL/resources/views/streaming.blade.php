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
</head>
@include('layout.user_header')

<body>
    @include('layout.user_navbar')

    <!-- Navbar -->
    <!-- Streaming Section -->
    <!-- Watch -->
    <div class="video_streaming">
        <div class="video_containervideo">
            <video controls autoplay>
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
