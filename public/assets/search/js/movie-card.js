"use strict";

import { imageBaseURL } from "./api.js";

// movie card

export function createMovieCard(movie) {
  const { poster_path, title, vote_average, release_date, id } = movie;

  const card = document.createElement("div");
  card.classList.add("movie-card");

  // Generate the URL using the movie ID
  const redirectUrl = movieRedirectUrl.replace(':id', id);

  card.innerHTML = `
    <figure class="poster-box card-banner">
      <img src="${imageBaseURL}w342${poster_path}" alt="${title}" class="img-cover" loading="lazy">
    </figure>
    
    <h4 class="title">${title}</h4>
    
    <div class="meta-list">
      <div class="meta-item">

        <span class="span" style="color: rgb(0, 186, 0);"">${vote_average.toFixed(2)*10}% Scored</span>
      </div>
    
      <div class="card-badge">${release_date.split("-")[0]}</div>
    </div>
    
    <a href="${redirectUrl}" class="card-btn" title="${title}" "></a>

    
  `;

  return card;
}
