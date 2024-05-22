function fetchVideo(element) {
    const seriesId = element.getAttribute('data-series-id');
    const apiKey = '123113d4a4822456c35fc67ce8dd0c16';
    const videoUrl = `https://api.themoviedb.org/3/tv/${seriesId}/videos?api_key=${apiKey}`;
    const detailsUrl = `https://api.themoviedb.org/3/tv/${seriesId}?api_key=${apiKey}`;

    // Gọi API để lấy video trailer
    fetch(videoUrl)
        .then(response => response.json())
        .then(data => {
            if (data.results.length > 0) {
                const youtubeKey = data.results[0].key;
                const videoContainer = element.querySelector('.video-container');
                videoContainer.innerHTML = `<iframe src="https://www.youtube.com/embed/${youtubeKey}" frameborder="0" allowfullscreen></iframe>`;
                videoContainer.style.display = 'block';
            }
        });

    // Gọi API để lấy thông tin chi tiết của series
    fetch(detailsUrl)
        .then(response => response.json())
        .then(data => {
            const infoContainer = element.querySelector('.info-container');
            const genres = data.genres.map(genre => genre.name).join(' • ');
            const score = (data.vote_average * 10).toFixed(0) + '% Score';
            const episodes = data.number_of_episodes + ' Episodes';
            const outputHtml = `
                <div>
                    <i class="bi bi-play-circle-fill card-icon"></i>
                    <i class="bi bi-plus-circle card-icon"></i>
                </div>
                <div>
                    <i class="bi bi-arrow-down-circle card-icon" onclick="redirectTo('${data.id}')"></i>
                </div>
                <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">${score}</p>
                <span class="m-2 netflix-card-text text-white">${episodes}</span>
                <span class="border netflix-card-text p-1 text-white">HD</span>
                <span class="netflix-card-text text-white">${genres}</span>
            `;
            infoContainer.innerHTML = outputHtml;
        });
}