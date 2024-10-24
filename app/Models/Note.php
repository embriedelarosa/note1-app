<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /*attributes ng note app*/
    protected $fillable = ['title', 'content'];
    use HasFactory;
}
