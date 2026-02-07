<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function all()
     {
         return $this->model->get();
     }
    public function paginate(array $filters = [], int $perPage = 12)
    {

      return $this->model->with('category')->when(isset($filters['category']),fn($q)=>$q->where('category_id',$filters['category']))
      ->when(isset($filters['search']),fn($q)=>$q->where('name','like','%'.$filters['search'].'%'))
            ->paginate($perPage)
            ->withQueryString();
    }

    public function find($id){
return $this->model->with('category')->findOrFail($id);
}


    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete($product)
    {
        $product->delete();
    }
}
