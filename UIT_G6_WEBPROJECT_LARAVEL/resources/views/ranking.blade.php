<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Phim cũ</title>
    <link rel="stylesheet" href="{{ asset('css/rank.css') }}" />
</head>
<body>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />

    <div class="overflow-container">
        <h3 style="color: white; margin-left: 20px; margin-top: 20px">Top 10 phim hot trong ngày</h3>
        <div class="number-row">
            @foreach($movies as $movie)
            <div class="number-cell">
            <span><p>{{ $movie->rank }}</p></span>
            <div class="empty-cell" style="position:relative;">
            <img src="{{ $movie->poster_link }}" alt="">
            </div>
            </div>
            @endforeach
        </div>
        
    </div>

    <div>
        <button class="scroll-right">▶</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const numberRow = document.querySelector(".number-row");
            const scrollRightButton = document.querySelector(".scroll-right");
            const numberCellWidth = document.querySelector(".number-cell").offsetWidth;
            const arrowKeys = [37, 38, 39, 40];
            const emptycell = document.querySelectorAll(".empty-cell");
            const popup = document.querySelectorAll(".pop-up");
            const scrollright = document.getElementById('scroll-right');

            scrollRightButton.addEventListener("click", function () {
                const currentLeft = parseFloat(getComputedStyle(numberRow).left);
                const newLeft = currentLeft - numberCellWidth * 6;
                numberRow.style.left = newLeft + "px";
                if (newLeft <= -numberCellWidth * 10) {
                    numberRow.style.left = "0";
                }
            });

            document.addEventListener("keydown", function (event) {
                if (arrowKeys.includes(event.keyCode)) {
                    event.preventDefault();
                    if (event.keyCode === 37) {
                        currentPosition--;
                    } else if (event.keyCode === 39) {
                        currentPosition++;
                    }
                    updatePosition();
                }
            });
        });
    </script>
</body>
</html>
