<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'order',
        'payment_method',
        'card_number',
        'expiry_date',
        'cvv',
        'total',
        'payment_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // التأكد من أن الحقل مطابق
    }
}
