<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Pagoda extends Model
{
	use SoftDeletes;
	use Sluggable;

    protected $fillable = ['name','lat','lng','founder_id','built_in','description','image_id','slug'];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function image()
    {
    	return $this->belongsTo(PagodaImage::class,'image_id','id');
    }
}
