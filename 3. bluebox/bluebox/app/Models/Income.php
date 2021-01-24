<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_product',
        'date'
    ];

    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }

    public function product() {
        return $this->belongsTo(Product::class,'id_product');
    }
}
