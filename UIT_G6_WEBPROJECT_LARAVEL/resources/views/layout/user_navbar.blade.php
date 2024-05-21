<!--  Navbar -->
<div class="navbar">
    <div class="navbar-container">
        <div class="logo-container">
            {{-- <h1 class="logo">Netflop</h1> --}}
            <a style="display: flex; align-items: center; height: 100vh;" href="/index"><img class="logo"
                    src="https://fontmeme.com/permalink/240508/a0a2db44cf95ee3c25441c8005f90516.png" alt="netflix-font"
                    border="0"></a>
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
        <div class="nav-item dropdown no-arrow">
            <i><a title="Phim" href="./search.html" class="fa-solid fa-magnifying-glass"></a></i>
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle"
                    src="{{Auth::user()->avartar}}">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                
            </a>
            <div class="form-info hidden" aria-labelledby="userDropdown">

                @if (Auth::user()->role_id == 1)
                    <a href="/home" class="dropdown-item">
                        
                        <i class='bx bx-home-smile'></i>
                        Go To Dashboard
                    </a>
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
    {{-- Chat bot --}}
    <div class="chat-bot">
        <div class="logo-chat" onclick="openChatBot(this)">
            <span class="animation-logo">
                
            </span>
            <div class="logo-message">
                <img src="datasources/img/logoai.png" style="height: 40px; weight:40px;" alt="Chat Logo" class="chat-logo">
            </div>
        </div>
        
        <div class="chat-content">
            <div class="close-chat" onclick="closeChatBot(this)">
                <i class='bx bx-x'></i>
            </div>
            <div class="content-text" user="{{AUTH::user()->avartar}}">
                {{-- <div class="message-text">
                    <img class="img-chat" src="{{AUTH::user()->avartar}}">
                    <div>
                        <p class="msg msg_user">
                            i am sory ser
                        </p>
                    </div>
                </div>
                <div class="message-text message-bot-text">
                   
                    <div>
                        <p class="msg msg_bot">
                            thank for watching me video
                        </p>
                    </div>
                    <img class="img-chat" src="/uploads/1713541793.png">
                </div> --}}
            </div>
            <div class="btn-sent">
                <div class="btn-send-detail">
                    <input type="file" name="image_file" class="add_img">
                    <span class="icon_1" onclick="add_image()">
                        <i class='bx bx-plus-circle'></i>
                    </span>
                    <input type="text" name="text_file" placeholder="Type a message">
                    <span class="send" onclick="sendMessage()">
                        <i class='bx bx-send'></i>
                    </span>
                </div>
                <div class="temp_image">
                    
                </div>
            </div>
        </div>
    </div>
</div>
