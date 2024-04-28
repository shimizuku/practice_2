<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Earning extends Model
{
    use HasFactory, Sortable, SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id';
    protected $dates = [
        'visit_at',
        'deleted_at'
    ];
    protected $fillable = [
        'date',
        'visit_at',
        'customer_name',
        'customer_gender',
        'customer_age',
        'create_user',
        'update_user',
    ];
}
