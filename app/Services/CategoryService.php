<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $repo;
    protected $imageService;

    public function __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function create(array $data)
    {

        return $this->repo->create($data);
    }

    public function update($category, array $data)
    {

        return $this->repo->update($category, $data);
    }

    public function delete($category)
    {

        return $this->repo->delete($category);
    }
}
