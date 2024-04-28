<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EarningDetail extends Model
{
    use HasFactory, Sortable;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $primaryKey = 'id';
    protected $fillable = [
        'earnings_id',
        'menu_id',
        'name',
        'price'
    ];
}
