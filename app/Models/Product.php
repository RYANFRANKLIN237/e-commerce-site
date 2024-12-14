<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['productname','cat_id','description','price','photo'];

    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
}
