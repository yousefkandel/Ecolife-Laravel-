<?php

namespace App\Services;

use App\Repositories\SliderRepository;
use App\Models\Slider;

class SliderService
{

protected $repo;
protected $imageService;
public function __construct(SliderRepository $repo,ImageService $imageService)
{
    $this->repo=$repo;
    $this->imageService=$imageService;
}
public function allActive()
{
    return $this->repo->allActive();
}

public function all(){
  return  $this->repo->all();
}
public function paginate($perPage=12){
  return  $this->repo->paginate($perPage);
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
public function update(Slider $slider ,array $data){
if (isset($data['image'])) {
    $data['image']=$this->imageService->upload($data['image']);
}
    return $this->repo->update($slider, $data);
}
public function delete(Slider $slider){
    if (isset($data['image'])) {
    if ($slider->image) {
        $this->imageService->delete($slider->image);
    }
    }
    return $this->repo->delete($slider);
}

}
