<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['name', 'code', 'price', 'delivery_date', 'person_id', 'name', 
                            'email', 'phone', 'delivery_status', 'address'];

    public function person(){
        return $this->belongsTo(User::class, 'person_id', 'id');
    }
}
