<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
   //protected $fillable=['name','email','phone','msg','building_no','apartment_no','user_id']; 
   protected $guarded=[];
   
   public function user()
   {
    return $this->belongsTo(User::class);
   }
}
