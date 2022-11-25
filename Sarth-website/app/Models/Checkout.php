<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Checkout extends Model
{
    use HasFactory;

    protected $table = "orders";

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userID',
        'email',
        "name",
        'subtotal',
        'status'
    ];


    public function user(){

    return $this->belongsTo('App\Userinformation');
    }


    public function order_products(){
       /**
         * Get all of the comments for the Checkout
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */

            return $this->hasMany(OrderProduct::class, 'orderID', 'id');

    }
}
