<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="datasources/img/netflop.png">
</head>
@include('layout.user_header')

<body>
    @include('layout.user_navbar')
    <!-- Navbar -->
    <?php
    $msg = session()->get('status');
    if ($msg) {
        echo "
                <div class='msg_profile'>
                    <p class='info_profile'>{$msg}</p>
                </div>";
    }
    ?>
    <!-- Streaming Section -->
    <!-- Watch -->
    <div class="video_streaming">
        <div class="video_container">
            <video controls>
                <source src="https://dl8r043njp66m.cloudfront.net/queenoftears_ 215720_ep1.mp4" type="video/mp4" />
            </video>
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
    < </body>

</html>
