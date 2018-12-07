<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Protected & create connection
    protected $connection = 'mysql';

    // Protected table name
    protected $table = 'products';

    // Protected fillable or inserts
    protected $fillable = ['name', 'description'];

    // Protected define order
    protected $sorted = ['name', 'description'];

    // Protected hidden fields
    protected $hidden = ['id', 'created_at', 'update_at'];

    // Protected guard
    protected $guarded = ['name', 'description'];


    // Relationships
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
