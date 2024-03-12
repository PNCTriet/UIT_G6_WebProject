<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function showPopup($id)
    {
        // Xử lý logic để lấy dữ liệu cho pop-up

        return view('popup', ['id' => $id]);
    }
}
