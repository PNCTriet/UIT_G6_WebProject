<?php
    namespace App\Models;

use Illuminate\Support\Facades\DB;

    class test{
        public static function all(){
            return [
                [   'id'=>1,
                    'title'=>'title 1',
                    'description'=>'dưng lo anh cha sao ha,nhung dieu trong giac mo noi em binh'
                ],
                [
                    'id'=>2,
                    'title'=>'title 2',
                    'description'=>'dưng lo anh cha sao ha,nhung dieu trong giac mo noi em binh'
                ]

            ];
        }
        public static function find($id){
            $array =self::all();
            foreach($array as $value){
                if($value['id']==$id){
                    return $value;
                }
            }
            return 'not found id';
        }
        public static function query(){
            $results =DB::table('fights')->get();
            return $results;
        }
    }