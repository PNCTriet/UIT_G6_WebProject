<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\File;

class GeminiController extends Controller
{
    public function only_text(Request $request){
        $question =$request->question ?? "Xin chào ngài";
        $res_AI =Gemini::geminiPro()->generateContent($question);
        return response()->json(["text"=>$res_AI->text()]);
    }
    
    public function text_image(Request $request){
        if($request->has('image')){
            $file_image =$request->file('image');
            $type_image =$file_image->getClientOriginalExtension();
            $name_file =time().'.'.$type_image;
            $file_image->move('chatBot/',$name_file);

            // return response()->json([
            //     'image'=>$request->file('image'),
            //     'text'=>$_SERVER['DOCUMENT_ROOT'].'/chatBot/'."{{$name_file}}"
            // ]);
            $upload = $_SERVER['DOCUMENT_ROOT']."/chatBot/{$name_file}";
            $question =$request->question ?? "Hình ảnh này nói về gì";
            $image =$upload ;
            $res_AI =Gemini::geminiProVision()->generateContent([
                $question,
                new Blob(
                    mimeType: MimeType::IMAGE_JPEG,
                    data:base64_encode(
                        file_get_contents($image)
                    )
                )
            ]);
            if(File::exists("chatBot/{$name_file}")){
                File::delete("chatBot/{$name_file}");
            }
            return response()->json(['text'=>$res_AI->text()]);
        }
    }
}
