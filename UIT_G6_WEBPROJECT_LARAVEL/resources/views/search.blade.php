<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
</head>
<body>
    <div class='row'>
        <div class="c-filter">
            <div class="left-filter">
                <h2>Duyệt tìm theo ngôn ngữ</h2>
            </div>
            <div class="right-filter">
                <div class="language-f">
                    <span>Điều chỉnh theo tuỳ chọn của bạn</span>
                    <select class="language1">
                        <option value="0">Ngôn ngữ gốc</option>
                        <option value="1">Select 1</option>
                        <option value="2">Select 2</option>
                    </select>
                    <select class="language2">
                        <option value="0">Tiếng Anh</option>
                        <option value="1">Select 1</option>
                        <option value="2">Select 2</option>
                    </select>
                    <span>Sắp xếp theo</span>
                    <select class="language3" name="language3" id="language3" onchange="displayValue()">
                        <option value="0" selected>Đề xuất dành cho bạn</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div id="languageDisplay"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function displayValue() {
            var value = document.getElementById("language3").value;
            $.ajax({
                url: '{{ route("getValue") }}', // Assuming you define a route for getting value
                type: 'post',
                data: {x: value},
                success: function(response){
                    $('#languageDisplay').html(response);
                }
            });
        }

        // Trigger 'change' event when the webpage is loaded
        $(document).ready(function(){
            $('#language3').change();
        });
    </script>
</body>
</html>
