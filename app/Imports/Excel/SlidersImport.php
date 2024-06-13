<?php

namespace App\Imports\Excel;

use App\Models\Slider;
use Maatwebsite\Excel\Concerns\ToModel;

class SlidersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Slider([
//            'id' => $row['id'],
            'title' => $row['title'],
            'content' => $row['content'],
            'slug' => $row['slug'],
            'category_id' => $row['category_id'],
            'image' => $row['image'],
            // Eğer 'image' sütunu Excel'de bulunmuyorsa varsayılan bir değer verebilirsiniz. Yani >> 'image' => $row['image'] ?? 'default.jpg',
        ]);
    }
}
