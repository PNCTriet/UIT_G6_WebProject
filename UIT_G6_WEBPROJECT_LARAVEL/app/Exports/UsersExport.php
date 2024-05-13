<?php

namespace App\Exports;
use App\Models\user_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return user_model::select('id','name','birthday','email','phoneNumber','address')->get();
    }
    // this method indicates that data is presented in a way that's suitable for Excel
    public function map($user):array
    {
        //map data into headings 
        return [
            $user->id,
            $user->name,
            $user->birthday,
            $user->email,
            $user->phoneNumber,
            $user->address
            
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'BirthDay',
            'Email',
            'Phone Number',
            'Address'
        ];
    }
}
