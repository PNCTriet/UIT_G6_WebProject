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
    <link rel="stylesheet" href="css/style_index.css" />
    <link rel="stylesheet" href="css/style_profile.css" />
    <title>Netflop Profile</title>
    <link rel="shortcut icon" type="image/png" href="datasources/img/netflop.png">
</head>
@include('layout.user_header')

<body>
    @include('layout.user_navbar')
    <!-- Navbar -->

    <!-- Profile Update Section -->
    <div class="profile-container-p" id="backround">
        <div class="container-profile">
            <h2 style="color: aliceblue">User Profile</h2>
            <form action="/update-profile" method="POST" enctype="multipart/form-data">
              @csrf <!-- CSRF token -->
              <!-- Thông tin hình đại diện -->
              <div class="profile-pic">
                  <img src="{{ Auth::user()->avartar }}" alt="Avatar" class="avatar" id="avatar">
                  <!-- Trường input cho việc upload avatar mới -->
                  <input type="file" name="avatar" accept="image/*">
              </div>
              <!-- Thông tin cá nhân -->
              <div class="profile-info">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
          
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
          
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
          
                  <label for="address">Address</label>
                  <input type="text" id="address" name="address" value="{{ Auth::user()->address }}" required>
          
                  <!-- Nút cập nhật thông tin -->
                  <button type="submit">Update Profile</button>
              </div>
          </form>
          
          
        </div>
    </div>

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

    <script>
      document.getElementById('avatar').addEventListener('click', function() {
          document.getElementById('avatarInput').click();
      });
  </script>
    < </body>

</html>
