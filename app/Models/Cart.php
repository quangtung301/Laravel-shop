<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'product_id',
        'pty',
        'status',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


    protected $status=[
        '1'=>[
            'class'=> 'defaul',
            'name'=>'Đơn hàng mới'
        ],
        '2'=>[
            'class'=> 'danger',
            'name'=>'Đang vận chuyển'
        ],
        '3'=>[
            'class'=> 'infor',
            'name'=>'Đã nhận'
        ],
        '4'=>[
            'class'=> 'sucess',
            'name'=>'Đã hủy'
        ]
    ];
    public  function getStatus(){
        return Arr::get($this->status,$this->tst_status,'[N/A]');
    }
}
