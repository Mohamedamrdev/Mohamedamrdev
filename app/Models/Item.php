<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_date ',
        'title',
        'licence ',
        'dimension',
        'price',
        'format',
        'tag_id',
    ];
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}

