<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'category_id', 'price', 'image'];
        
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function orderUsers(){
        return $this->belongsToMany('App\User', 'orders');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function likeUsers(){
        return $this->belongsToMany('App\User', 'likes');
    }
    
    // ログイン者以外の出品一覧
    public function scopeOtherItems(){
        return $this->where('user_id', '!=', \Auth::user()->id);
    }
    // // userの出品一覧
    // public function scopeExhibitItems($id){
    //     return $this->where('user_id', '==', $id);
    // }
    
    public function isLikedBy($id){
        return $result = $this->likeUsers->contains('id', $id);
    }
    
}
