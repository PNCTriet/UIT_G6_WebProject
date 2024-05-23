

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
                    <a href="/index">Trang chủ</a>
                </li>

                <li class="menu-list-item">
                    <a title="Phim" href="">Phim T.Hình</a>
                </li>
                <li class="menu-list-item"><a title="Phim" href="/index">Phim</a></li>
                <li class="menu-list-item">
                    <a title="Phim" href="/profile">Hồ sơ</a>
                </li>
                <li class="menu-list-item">
                    <a title="Phim" href="/index">Danh sách của tôi</a>
                </li>
                <li class="menu-list-item">
                    <a title="Phim" href="/search">Duyệt tìm theo ngôn ngữ</a>
                </li>
            </ul>
        </div>
        <div class="nav-item dropdown no-arrow">
            <i><a title="Phim" href="./search.html" class="fa-solid fa-magnifying-glass"></a></i>
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ Auth::user()->avartar }}">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

            </a>
            <div class="form-info hidden" aria-labelledby="userDropdown">

                @if (Auth::user()->role_id == 1)
                    <a href="/home" class="dropdown-item">
                        <i class='bx bx-home-smile' style="color:black"></i>
                        Go To Dashboard
                    </a>
                @endif
                <div class="dropdown-divider"></div>
                <div style="margin-bottom: 10px;">
                    <a class="dropdown-item" style="margin-bottom: 10px;" href="/profile">
                        <i class="bi bi-person-circle fa-sm fa-fw mr-2 text-gray-400" style="color:black"></i>
                        Profile
                    </a>
                </div>
                <div style="margin-bottom: 10px;">
                    <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color:black"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Chat bot --}}
    <div class="chat-bot">
        <div class="logo-chat" onclick="openChatBot(this)">
            <span class="animation-logo">

            </span>
            <div class="logo-message">
                <img src="datasources/img/logoai.png" style="height: 40px; weight:40px;" alt="Chat Logo"
                    class="chat-logo">
            </div>
        </div>

        <div class="chat-content" id="cha">
            <i class="logochat">
                <img class="logochatimg" src="datasources/img/netflop_chatboxlogo.png" alt="netflix-font" border="0">
            </i>
            <div class="close-chat" onclick="closeChatBot(this)">
                <i class='bx bx-x'></i>
            </div>
            <div class="content-text" user="{{ AUTH::user()->avartar }}">
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
            <div class="btn-sent" id="chat">
                <div class="btn-send-detail" style="opacity: 0.5;">
                    <input type="file" name="image_file" class="add_img">
                    <span class="icon_1" onclick="add_image()">
                        <i class='bx bx-plus-circle'></i>
                    </span>
                    <input class="chat-content-input" type="text" name="text_file" placeholder="Type a message">
                    <span class="send" onclick="sendMessage()">
                        {{-- <i class='bx bx-send'></i> --}}
                        <button id="send-button" style="opacity: 1;"
                            class="btn-icon send-message-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true" data-reactid="1036">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </button>
                    </span>
                </div>
                <div class="temp_image">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/logout.js"></script>
