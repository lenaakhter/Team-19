<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productinformation extends Model
{
    use HasFactory;

    //This was made to show which table the data should be taken form for the products and their details.
    protected $table = 'productinformation';
}
