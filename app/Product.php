<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;
    protected $fillable = ['code', 'name', 'description', 'image', 'category_id', 'price', 'new', 'hit', 'recommend', 'count'];

// public function get_category(){
//      return Category::find($this->category_id);
// }
 public function category(){
     return $this->belongsTo(Category::class);
 }
 public function getPriceForCount(){
     if (!is_null($this->pivot)) {
         return $this->pivot->count * $this->price;
     }
     return $this->price;
 }
 public function countProduct(){
     
     return $this->pivot->count;
 }
 public function scopeHit($query){
     return $query->where('hit', '=', 1);
 }
 public function scopeNew($query){
     return $query->where('new', '=', 1);
 }
 public function scopeRecommend($query){
     return $query->where('recommend', '=', 1);
 }
public function scopeByCode($query, $code){
    return $query->where('code', '=', $code);
}
 public function setNewAttribute($value){
     $this->attributes['new'] = $value === 'on' ? 1 : 0;
 }
 public function setHitAttribute($value){
    $this->attributes['hit'] = $value === 'on' ? 1 : 0;
}
public function setRecommendAttribute($value){
    $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
}
 public function isHit(){

    return $this->hit === 1; 
 }
 public function isNew(){
    return $this->new === 1;
 }
 public function isRecommend(){
    return $this->recommend === 1;
 }
 
 public function isAvaible(){
     
     return $this->count > 0 && !$this->trashed();
 }
}
