<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productinformation extends Model
{
    use HasFactory;

    //This was made to show which table the data should be taken from for the products and their details.
    protected $table = 'productinformation';

    //made a primary key for the id of the product from the table in the database.
    protected $primaryKey = "productID";

    //to stop updated_at and created_at from showing up as we are not using them in our database
    public $timestamps = false;
}
