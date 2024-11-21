<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public function getImage()
    {
        if (!empty($this->image_name) && file_exists('uploaded_files/page/'.$this->image_name))
        {
            return url('uploaded_files/page/'.$this->image_name);
        }
        else
        {
            return "" ;
        }
    }
}
