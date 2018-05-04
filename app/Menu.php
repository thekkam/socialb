<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;

class Menu extends Model
{
   	protected $fillable = [
        'name', 'access', 'state', 'order', 'parent_id', 'page_id', 
    ];

    public function page(){
    	return $this->belongsTo(Page::class);
    }
}
