<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'item_date',
        'title',
        'licence',
        'dimension',
        'price',
        'format',
        'tag_id',
        'image',
    ];


    // إذا كانت لديك علاقة واحد إلى عدة مع نموذج آخر (مثل Tag)، استخدم هذه الدالة
    public function tag()
    {
        return $this->belongsTo(Tag::class); // تأكد من أن لديك نموذج Tag
    }

    // إذا كان لديك علاقة متعددة مع نفس النموذج (Item)
    public function items()
    {
        return $this->belongsToMany(Cart::class, 'cart_item'); // استخدم اسم جدول الارتباط الخاص بك
    }
}

