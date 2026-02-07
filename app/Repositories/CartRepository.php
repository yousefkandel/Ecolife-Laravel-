<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\CartItem;

class CartRepository
{
    protected $model;
    public function __construct(CartItem $cartItem)
    {
        $this->model=$cartItem;
    }
   public function all($userId){
return $this->model->with( 'product')->where('user_id',$userId)->get();

   }
   public function paginate($perPage = 12){


   }
   public function find($userId,$productId){
return $this->model->with( 'product')->where('user_id',$userId)->where('product_id',$productId)->first();

   }

   public function create(array $data){
        return $this->model->create($data);
   }
   public function update(CartItem $cartItem,array $data){
        return $cartItem->update($data);

   }
   public function delete(CartItem $cartItem){
        return $cartItem->delete();
       }
       public function clear($userId){
            return $this->model->where('user_id',$userId)->delete();
       }
}
