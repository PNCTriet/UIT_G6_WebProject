<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Netflop</title>
    <link rel="shortcut icon" type="image/png" href="datasources/img/netflop.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/search/css/style.css" />
    <script src="assets/search/js/global.js" defer></script>
    <script src="assets/search/js/index.js" type="module"></script>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        @include('layout.user_header')
        @include('layout.user_navbar')
    </div>
    <!-- Search Container -->
    <div id="search" style="min-height: 500px; max-height:fit-content; background-color: #151515; color: white;">
        <div class="header">
            <img src="datasources/img/netsearch.png" alt="search" style=" max-width:130px; " class="leading-icon" />
            <div class="search-box" search-box>
                <div class="search-wrapper" search-wrapper>
                    <input id="searchInput" style="align-items: center" type="text" name="search"
                        aria-label="search movies" placeholder="Search any movies..." autocomplete="off"
                        class="search-field" search-field />
                    <img src="assets/search/images/search.png" width="24" height="24" alt="search"
                        class="leading-icon" />
                </div>
            </div>
        </div>
        {{-- <div id="searchResults" style="height: fit-content; padding:10px 10px;"></div> --}}
    </div>


    @include('layout.user_footer')

    <script src="js/logout.js"></script>
    <script>
        const movieRedirectUrl = '{{ route('movies.redirectmovies', ':id') }}';
    </script>

</body>

</html>
