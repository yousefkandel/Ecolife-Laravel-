<?php
namespace App\Repositories;
use App\Models\Slider;
class SliderRepository{

    protected $model;
public function __construct(Slider $slider)
{
$this->model=$slider;
}
public function allActive()
{
    return $this->model->where('is_active', 1)->get();
}

public function all(){
return $this->model->get();
}
public function find($id){
return $this->model->findOrFail($id);
}

public function paginate($perPage = 12){
return $this->model->paginate($perPage);
}

public function create(array $data){
return $this->model->create($data);
}
public function update(Slider $slider,array $data){
return $slider->update($data);
}
public function delete(Slider $slider){
return $slider->delete();
}
    }



