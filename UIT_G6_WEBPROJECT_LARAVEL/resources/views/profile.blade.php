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
    <link rel="stylesheet" href="/css/style_profile.css">
    <title>Profile</title>
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
          <img
            class="profile-picture"
            src="datasources/img/profile.jpg"
            alt=""
          />
          <div class="profile-text-container">
            <i class="fas fa-caret-down"></i>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="height: 50px; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <a href="#!" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src=".\datasources\img\profile.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
                    {{$infor->last()->first_name}}
                    <br>
                    {{$infor->last()->email}}
              <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            @if(session()->has('success'))
                <p>
                    {{ session()->get('success') }}
                </p>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
              <form method="post" action="{{route('profile.store')}}">
              @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="username" id="input-username" class="form-control form-control-alternative" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="email@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" name="first_name" id="input-first-name" class="form-control form-control-alternative" placeholder="First name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" name="last_name" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-birthday">Birthday</label>
                          <input type="date" name="dob" id="input-birthday" class="form-control form-control-alternative" placeholder="Birthday">
                        </div>
                      </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" name="address" class="form-control form-control-alternative" placeholder="Home Address"  type="text">
                      </div>
                      <label class="form-control-label" for="input-phone">Phone Number</label>
                        <input id="input-address" name="phone" class="form-control form-control-alternative" placeholder="Phone Number"  type="tel">
                      </div>
                    </div>
                  </div>
                </div>
                <input class="btn btn-lg btn-primary" type="submit" />  
              </div>
              
            </div>
          </div>
        </div>
          <div class="member-footer">
            <div class="social-links">
              <a class="social-link" href="">
                <i class="fa-brands fa-facebook fa-xl" style="color: #aaaaaa;"></i>
              </a>
              <a class="social-link" href="">
                <i class="fa-brands fa-instagram fa-xl" style="color: #aaaaaa;"></i>
              </a>
              <a class="social-link" href="">
                <i class="fa-brands fa-twitter fa-xl" style="color: #aaaaaa;"></i>
              </a>
              <a class="social-link" href="">
                <i class="fa-brands fa-youtube fa-xl" style="color: #aaaaaa;"></i>
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