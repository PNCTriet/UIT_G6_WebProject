<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phim cũ</title>
</head>
<body>
    <style>
        body {background-color: rgb(56, 61, 66);overflow: hidden;}
        h3   {color: white;}
        
    </style>
    <br><br><br><br><br><br><br><br><br>


    <h3 style="position:fixed">Top 10 chương trình truyền hình tại Việt Nam hôm nay</h3><br><br><br><br><br>

    <style>
        .number-cell {
            outline:10px gray;
            color:black;
            font-size: 225px;
            white-space: nowrap;
            width:120px;
        }
        .empty-cell {
            position: absolute;
            top:30px;
            width: 142px;
            height:200px;
            background-color:lightgray;
        }
        .overflow-container {
            width: 2500px;
            overflow: hidden;
            position: relative;
        }
        .number-row {
            display: flex;
            position: relative;
            left: 0;
            transition: left 0.5s ease-out;
        }
        .empty-cell:hover{
            
            display: block;
        }
        .pop-up:hover{
            display: block;
            transform: scale(1.1);
        }
        .pop-up {
            position: fixed;
            bottom:50px;
            opacity:1;
            left: 540px;
            width: 409px;
            height: 578px;
            background-color:darkgray;
            padding: 10px;
            display: none;
            transition: all 0.3s ease-in-out;
        }
    </style>
    <div class="overflow-container">
        <div class="number-row">
            @foreach(range(1, 10) as $number)
                <div class="number-cell " style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                text-shadow: -3px -3px 0 gray,
                3px -3px 0 gray,
                -3px 3px 0 gray,
                3px 3px 0 gray;">{{ $number }}</div>
            <div class="empty-cell" style="position:relative;left:-5px">
                
                <img src="{{ $images[$number-1] }}" alt="">
            </div>
                <div class="pop-up">
                    <img scr="{{ $imagespopup[$number-1] }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numberRow = document.querySelector('.number-row');
            const scrollLeftButton = document.querySelector('.scroll-left');
            const scrollRightButton = document.querySelector('.scroll-right');
            const numberCellWidth = document.querySelector('.number-cell').offsetWidth;
            const arrowKeys = [37, 38, 39, 40];
            const emptycell=document.querySelectorAll('.empty-cell');
            const popup=document.querySelectorAll('.pop-up');



            emptycell.forEach(function(cell, index) {
                cell.addEventListener('mouseover', function() {
                    popup[index].style.display ='block';
                });

                cell.addEventListener('mouseout', function() {
                  
                    popup[index].style.display = 'none';

                });
                
                });




            scrollLeftButton.addEventListener('click', function() {
                const currentLeft = parseFloat(getComputedStyle(numberRow).left);
                const newLeft = currentLeft + numberCellWidth;
                numberRow.style.left = newLeft + 'px';
                if (newLeft >= 20) {
                    numberRow.style.left = -numberCellWidth * 10 + 'px';
                }
            });
    
            scrollRightButton.addEventListener('click', function() {
                const currentLeft = parseFloat(getComputedStyle(numberRow).left);
                const newLeft = currentLeft - numberCellWidth;
                numberRow.style.left = newLeft + 'px';
                if (newLeft <= (-numberCellWidth * 10)-20) {
                    numberRow.style.left = '0';
                }
            });

            document.addEventListener('keydown', function(event) {
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

    <div><button class="scroll-left" style="position:fixed;left:0;bottom:215px;opacity:0.1;width:50px;height:236px;font-family:Arial, Helvetica, sans-serif;font-size:40px"><</button>       
    </div>
    <div><button class="scroll-right" style="position:fixed;right:0;bottom:215px;opacity:0.1;width:50px;height:236px;font-family:Arial, Helvetica, sans-serif;font-size:40px">></button>
    </div>
</body>
</html>