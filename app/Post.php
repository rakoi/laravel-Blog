<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Comment;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Post extends Model
{
	public function Category(){
		return $this->belongsTo('App\Category');
	}
	public function comment(){
		return $this->hasMany('App\Comment');
	}

    public function getshowPostAttribute(){
 		
 		return substr(strip_tags($this->body),0,255)."...";

 	}
 	

}

