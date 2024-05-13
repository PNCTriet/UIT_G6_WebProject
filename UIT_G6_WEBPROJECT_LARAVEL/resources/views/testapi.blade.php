<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search TV Show</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #141414;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #222222;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            overflow-x: auto;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .cast-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .cast-item {
            flex: 0 0 auto;
            width: 100px;
            height: 100px;
            margin-right: 10px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        .cast-item:hover {
            border-color: #ffffff;
        }

        .cast-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // API Key của bạn từ TMDB
        $api_key = '123113d4a4822456c35fc67ce8dd0c16';

        // Từ khóa tìm kiếm
        $query = 'queen of tears';

        // URL của API của TMDB để tìm kiếm TV show
        $url = "https://api.themoviedb.org/3/search/tv?api_key=$api_key&query=" . urlencode($query);

        // Khởi tạo curl
        $curl = curl_init();

        // Cài đặt các tùy chọn cho curl
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        // Gửi yêu cầu và nhận kết quả
        $response = curl_exec($curl);

        // Đóng curl
        curl_close($curl);

        // Chuyển đổi JSON thành mảng
        $data = json_decode($response, true);

        // Hiển thị thông tin trả về từ API
        if (isset($data['results'][0])) {
            $show = $data['results'][0];
            // Hiển thị backdrop
            if (!empty($show['backdrop_path'])) {
                echo '<div class="backdrop-container">';
                echo '<img class="backdrop-img" src="https://image.tmdb.org/t/p/original/' . $show['backdrop_path'] . '" alt="' . $show['name'] . '">';
                // Lấy thêm nhiều backdrop và hiển thị ngẫu nhiên mỗi lần trang được tải lại
                $backdrop_count = 5; // Số lượng backdrop muốn hiển thị
                echo '</div>';
            } else {
                echo '<p>Không có backdrop.</p>';
            }
            echo '<h1>' . $show['name'] . '</h1>';
            echo '<img src="https://image.tmdb.org/t/p/w500/' . $show['poster_path'] . '" alt="' . $show['name'] . '">';
            echo '<p><strong>Ngày phát sóng:</strong> ' . $show['first_air_date'] . '</p>';
            echo '<p><strong>Đánh giá:</strong> ' . $show['vote_average'] . '</p>';
            echo '<p><strong>Tóm tắt:</strong> ' . $show['overview'] . '</p>';
            echo '<p><strong>Ngôn ngữ gốc:</strong> ' . $show['original_language'] . '</p>';
            echo '<p><strong>Quốc gia gốc:</strong> ' . implode(', ', $show['origin_country']) . '</p>';
            echo '<p><strong>Thể loại:</strong> ' . implode(', ', $show['genre_ids']) . '</p>';
            echo '<p><strong>Populariy:</strong> ' . $show['popularity'] . '</p>';
            echo '<p><strong>Số lượt đánh giá:</strong> ' . $show['vote_count'] . '</p>';
            
            // Gọi API để lấy thông tin về video trailer
            $video_url = "https://api.themoviedb.org/3/tv/{$show['id']}/videos?api_key=$api_key";
            $video_response = file_get_contents($video_url);
            $video_data = json_decode($video_response, true);

            // Kiểm tra xem có video trailer không và hiển thị nó
            if (!empty($video_data['results'])) {
                $youtube_key = $video_data['results'][0]['key'];
                echo '<div class="video-container">';
                echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube_key . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            } else {
                echo '<p>Không tìm thấy video trailer cho bộ phim này.</p>';
            }

            // Gọi API để lấy thông tin về diễn viên của bộ phim
            $credits_url = "https://api.themoviedb.org/3/tv/{$show['id']}/credits?api_key=$api_key";
            $credits_response = file_get_contents($credits_url);
            $credits_data = json_decode($credits_response, true);

            // Hiển thị hình diễn viên
            if (!empty($credits_data['cast'])) {
                echo '<div class="cast-container">';
                foreach ($credits_data['cast'] as $cast) {
                    $profile_path = $cast['profile_path'];
                    if ($profile_path) {
                        echo '<div class="cast-item"><img class="cast-img" src="https://image.tmdb.org/t/p/w200/' . $profile_path . '" alt="' . $cast['name'] . '"></div>';
                    }
                }
                echo '</div>';
            } else {
                echo '<p>Không tìm thấy thông tin về diễn viên cho bộ phim này.</p>';
            }
        } else {
            echo '<p>Không có kết quả.</p>';
        }
        ?>
    </div>
</body>

</html>
