<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\movie_model;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MoviesExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return movie_model::select('*')->get();
    }
    public function map($movie):array
    {
        return [
            $movie->id,
            $movie->title,
            $movie->description,
            $movie->created_at,
            $movie->updated_at
        ];
    }
    public function headings(): array
    {
        return[
            'ID',
            'Movie Name',
            'Description',
            'Created_at',
            'Updated_at'
        ];
    }
}
