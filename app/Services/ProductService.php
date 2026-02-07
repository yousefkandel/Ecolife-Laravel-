<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductService
{

protected $repo;
protected $imageService;
public function __construct(ProductRepository $repo,ImageService $imageService)
{
    $this->repo=$repo;
    $this->imageService=$imageService;
}

public function all(){
  return  $this->repo->all();
}
public function paginate(array $filters = [],$perPage=12){
  return  $this->repo->paginate($filters,$perPage);
}
public function find($id){
    return $this->repo->find($id);
}
public function create(array $data){
  if (isset($data['image'])) {
        $data['image']=$this->imageService->upload( $data['image']);
    }
    return $this->repo->create($data);
}
public function update(Product $product ,array $data){
if (isset($data['image'])) {
    $data['image']=$this->imageService->upload($data['image']);
}
    return $this->repo->update($product, $data);
}
public function delete(Product $product){
    return $this->repo->delete($product);
}

}
