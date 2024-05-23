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
    {{-- <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            console.log('Input event triggered'); // Thêm dòng này để kiểm tra
            const query = this.value;
            fetch(`/search/results?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Thêm dòng này để kiểm tra
                    const searchResults = document.getElementById('searchResults');
                    searchResults.innerHTML = '';

                    if (data.length === 0) {
                        searchResults.innerHTML = '<p>No results found</p>';
                        return;
                    }

                    data.forEach(item => {
                        let resultItem = document.createElement('div');
                        resultItem.classList.add('card', 'mb-3');
                        resultItem.innerHTML = `
                            <div class="card-body">
                                <h5 class="card-title">${item.title}</h5>
                                <p class="card-text">${item.overview}</p>
                                <img src="${item.poster_link}" class="row-poster" onclick="redirectTo('${item.redirect_url}')">
                                <div class="video-container">
                                    <iframe class="videocontainer" id="youtubeVideo" src="https://www.youtube.com/embed/${item.youtube_key}" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <section class="d-flex justify-content-between">
                                    <div>
                                        <i class="bi bi-play-circle-fill card-icon"></i>
                                        <i class="bi bi-plus-circle card-icon"></i>
                                    </div>
                                    <div>
                                        <i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo('${item.redirect_url}')"></i>
                                    </div>
                                </section>
                                <section class="d-flex align-items-center justify-content-between">
                                    <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">${item.vote_average * 10}% Score</p>
                                    <span class="m-2 netflix-card-text text-white">${item.number_of_episodes} Episodes</span>
                                    <span class="border netflix-card-text p-1 text-white">HD</span>
                                </section>
                                <span class="netflix-card-text text-white">${item.genres.join(' • ')}</span>
                            </div>
                        `;
                        searchResults.appendChild(resultItem);
                    });
                })
                .catch(error => console.error('Error:', error));
        });

        function redirectTo(url) {
            window.location.href = url;
        }
    </script> --}}
</body>

</html>
