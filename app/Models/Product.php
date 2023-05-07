<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=['status','category_id','booktitle','bookauthor','bookedition','bookquantity','bookimage','total_request'];
    
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function getdonate()
    {
        return $this->hasMany(getdonate::class);
    }
}
