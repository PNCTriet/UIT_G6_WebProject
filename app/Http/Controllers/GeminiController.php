<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\File;

class GeminiController extends Controller
{
    public function only_text(Request $request)
    {
        $prefix = "bạn là tư vấn viên của web xem phim Netflop, hãy chỉ tư vấn về chủ đề phim ảnh và nhắc tới netflop nhiều (không phải netflix), hãy giúp tôi tư vấn cho khách hàng cùng hình ảnh đính kèm sau : ";
        $question = $prefix . ($request->question ?? "");
        $res_AI = Gemini::geminiPro()->generateContent($question);
        return response()->json(["text" => $res_AI->text()]);
    }

    public function text_image(Request $request)
    {
        if ($request->has('image')) {
            $file_image = $request->file('image');
            $type_image = $file_image->getClientOriginalExtension();
            $name_file = time() . '.' . $type_image;
            $file_image->move('chatBot/', $name_file);

            // return response()->json([
            //     'image'=>$request->file('image'),
            //     'text'=>$_SERVER['DOCUMENT_ROOT'].'/chatBot/'."{{$name_file}}"
            // ]);
            $upload = $_SERVER['DOCUMENT_ROOT'] . "/chatBot/{$name_file}";
            $prefix = "bạn là tư vấn viên của web xem phim Netflop, hãy chỉ tư vấn về chủ đề phim ảnh và nhắc tới netflop nhiều (không phải netflix), hãy giúp tôi tư vấn cho khách hàng cùng hình ảnh đính kèm sau : ";
            $question = $prefix . ($request->question ?? "");

            $image = $upload;
            $res_AI = Gemini::geminiProVision()->generateContent([
                $question,
                new Blob(
                    mimeType: MimeType::IMAGE_JPEG,
                    data: base64_encode(
                        file_get_contents($image)
                    )
                )
            ]);
            if (File::exists("chatBot/{$name_file}")) {
                File::delete("chatBot/{$name_file}");
            }
            return response()->json(['text' => $res_AI->text()]);
        }else{
            $prefix = "bạn là tư vấn viên của web xem phim Netflop, hãy chỉ tư vấn về chủ đề phim ảnh và nhắc tới netflop nhiều (không phải netflix), hãy giúp tôi tư vấn cho khách hàng có câu hỏi sau: ";
            $question = $prefix . ($request->question ?? "");
            $res_AI = Gemini::geminiPro()->generateContent($question);
            return response()->json(["text" => $res_AI->text()]);
        }
    }
}
