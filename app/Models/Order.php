<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orderinfo';
    protected $primaryKey = 'orderinfo_id';
    public $timestamps = false;
    protected $fillable = ['customer_id','date_placed','date_shipped','shipping','shipvia','status'];
}
