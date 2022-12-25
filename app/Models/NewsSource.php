<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    use HasFactory;


    protected $fillable = ['source','name', 'link','avatar'];
    public $timestamps = false;
}
