<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $table="basket";   //table name

/**
 * Get the ProductInformation that owns the Basket
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function products()
{
    return $this->belongsTo(Productinformation::class, 'productID', 'productID');
}
}
