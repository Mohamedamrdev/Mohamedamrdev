<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
    public function items()
    {
        return $this->hasMany(Item::class, 'tag_id');
    }
}
