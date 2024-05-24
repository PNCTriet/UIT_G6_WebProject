"use strict";

import { api_key, fetchDataFromServer } from "./api.js";
import { createMovieCard } from "./movie-card.js";

export function search() {
    const searchWrapper = document.querySelector("[search-wrapper]");
    const searchField = document.querySelector("[search-field]");

    const searchResultModal = document.createElement("div");
    searchResultModal.classList.add("search-modal");
    document.getElementById("search").appendChild(searchResultModal);

    let searchTimeout;

    searchField.addEventListener("input", function () {
        if (!searchField.value.trim()) {
            searchResultModal.classList.remove("active");
            searchWrapper.classList.remove("searching");
            clearTimeout(searchTimeout);
            return;
        }

        searchWrapper.classList.add("searching");
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {
            fetchDataFromServer(
                // `https://api.themoviedb.org/3/search/movie?api_key=${api_key}&query=${searchField.value}&page=1&include_adult=false`,
                `https://api.themoviedb.org/3/search/movie?api_key=${api_key}&query=${encodeURIComponent(
                    searchField.value
                )}`,
                function ({ results: movieList }) {
                    searchWrapper.classList.remove("searching");
                    searchResultModal.classList.add("active");
                    searchResultModal.innerHTML = ""; // remove old results

                    searchResultModal.innerHTML = `
            <p class="label" style="margin-left:10px;">Results for</p>
            
            <p class="label" style="margin-left:10px; font-size:20px; color:white;">${searchField.value}<p class="label">
            
            <div class="movie-list-search">
              <div class="grid-list"></div>
            </div>
          `;

                    for (const movie of movieList) {
                        const movieCard = createMovieCard(movie);

                        searchResultModal
                            .querySelector(".grid-list")
                            .appendChild(movieCard);
                    }
                }
            );
        }, 500);
    });
}
