<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Defining table to interact with and fields that can be written to...

    // Table to interact with
    protected $table = 'students';

    // Fileds that can be written to
    protected $fillable = ['name', 'course'];
}
