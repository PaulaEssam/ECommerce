<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSettings extends Model
{
    use HasFactory;
    public function getLogo()
    {
        if (!empty($this->logo) && file_exists('uploaded_files/settings/'.$this->logo))
        {
            return url('uploaded_files/settings/'.$this->logo);
        }
        else
        {
            return "" ;
        }
    }

    public function getFevicon()
    {
        if (!empty($this->fevicon) && file_exists('uploaded_files/settings/'.$this->fevicon))
        {
            return url('uploaded_files/settings/'.$this->fevicon);
        }
        else
        {
            return "" ;
        }
    }
    public function getFooterPaymentIcon()
    {
        if (!empty($this->footer_payment_icon) && file_exists('uploaded_files/settings/'.$this->footer_payment_icon))
        {
            return url('uploaded_files/settings/'.$this->footer_payment_icon);
        }
        else
        {
            return "" ;
        }
    }
}
