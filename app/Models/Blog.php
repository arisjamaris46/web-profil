<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';


    /*
    *set tag attribute
    */

    // public function setTagsAttribute($value){
    //     $this->attributes['tags'] = json_encode($value);
    // }

    // public function getTagsAttribute($value){
    //     $this->attributes['tags'] = json_decode($value);
    // }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'id_kategori');
    }


}
