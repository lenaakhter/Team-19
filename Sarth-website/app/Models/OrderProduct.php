<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productinformation;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = "order_products";
    protected $fillable = [
        'orderID',
        'productID',
         'price',
          'qty',
          'gamekey',
      ];


      //change name if following function fails
     /**
       * Get the user that owns the OrderProduct
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
       */
      public function productinfo()
      {
          return $this->belongsTo(Productinformation::class, 'productID', 'productID');
      }






    }
