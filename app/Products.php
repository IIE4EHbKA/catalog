<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category', 'price', 'desc', 'image'
    ];

    public static function get_list()
    {
        return DB::table('products')
            ->join('category', 'products.category', '=', 'category.cid')
            ->select('*')
            ->paginate(24);
    }

}
