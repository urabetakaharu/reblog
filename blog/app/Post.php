<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


// インサートで入れたPostsがPost.php
class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = 
    [
        'title',
        'body',
        'category_id'
    ];

    
   
    function getPaginateByLimit(int $limit_count = 5)
    { 
        // updated_atで降順DESCに並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

