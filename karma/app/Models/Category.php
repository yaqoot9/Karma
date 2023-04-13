<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title'];



    //Parent-child relationship
    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

 public function parent(){
    $this->belongsTo(Category::class,'parent_id','id');
 }
}
