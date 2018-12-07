<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Protected & create connection
    protected $connection = 'mysql_2';

    // Protected table name
    protected $table = 'categories';

    // Protected fillable or inserts
    protected $fillable = ['name', 'description'];

    // Protected define order
    protected $sorted = ['name', 'description'];

    // Protected hidden fields
    protected $hidden = ['id', 'created_at', 'update_at'];

    // Protected guard
    protected $guarded = ['name', 'description'];
    
    
    // Relationships
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}


