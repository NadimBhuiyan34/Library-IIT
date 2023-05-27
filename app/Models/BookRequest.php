<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;
    protected $casts = [
        'notified_at' => 'datetime',
    ];
    protected $table='bookrequests';
    protected $fillable=['user_id','book_id','return_date','approved_date','status','fine','issue_date','approved_id', 'notified_at'];





    public function product()
    {
        return $this->belongsTo(Product::class,'book_id');
    }
     public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
