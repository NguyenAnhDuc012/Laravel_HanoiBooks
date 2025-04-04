<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = 'the_loai';
    protected $primaryKey = 'MaTheLoai';

    public $incrementing = true;
    protected $keyType = 'int';
}
