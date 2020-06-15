<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];
    public function  products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getSumOrder(){
        $sum = 0;
        foreach($this->products()->withTrashed()->get() as $product){
            $sum += $product->getPriceForCount(); 
        }
        return $sum;
    }
    public static function changeFullSum($changeSum){
       $sum = self::getFullPrice() + $changeSum;

       session(['full_order_sum' => $sum]);
    }
    public static function eraseOrderSum(){
        session()->forget('full_order_sum');
    }
    public static function getFullPrice(){
         
        return session('full_order_sum', 0);
    }
    public function countOfProducts(){
        $count = 0;
        foreach($this->products as $product){
            $count+= $product->countProduct();
        }
        if ($count > 0) {
           return "Count of products: " . $count;
        }
        else{
            return 'basked is empty';
        }
        
    }
public function saveOrder($name, $phone, $email){
        if ($this->status == 0) {
             $this->name = $name;
        $this->phone = $phone;
        // $this->email = $email;
        
        $this->status = 1;
        $this->save();
        session()->forget('orderId');

        return true;
        }else{
            return false;
        }
       
    }
    public function scopeActive($query){
        return $query->where('status', '=', 1);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
