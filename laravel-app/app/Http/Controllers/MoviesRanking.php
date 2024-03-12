<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesRanking extends Controller
{
    public function index(){
        $imagespopup=[
            'storage/1pop.png',
            'storage/2pop.png',
            'storage/3pop.png',
            'storage/4pop.png',
            'storage/5pop.png',
            'storage/6pop.png',
            'storage/7pop.png',
            'storage/8pop.png',
            'storage/9pop.png',
            'storage/10pop.png',
        ];
        $images=[
            'storage/1ch.png',
            'storage/2ch.png',
            'storage/3ch.png',
            'storage/4ch.png',
            'storage/5ch.png',
            'storage/6ch.png',
            'storage/7ch.png',
            'storage/8ch.png',
            'storage/9ch.png',
            'storage/10ch.png',
        ];
        $title ='Top 10 bộ phim yêu thích nhất';
        $x=1; $y=2; $z=3;
        return view('movies.index', compact('title','images','imagespopup'));
    }
    
}
