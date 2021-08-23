<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use App\Traits\ImageUpload;
use Illuminate\Support\Str;

class ProductServices {

    use ImageUpload;
    protected $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getIndex()
    {
        $query = $this->repo->getRelation('category');
        return $query->orderBy('id', 'desc')->paginate(15);

    }

    // public function

    public function getCat()
    {
        return $this->repo->getCat();
    }

    public function store($params)
    {
        $params = $this->imageUpload($params);
        $params['slug'] = Str::slug($params['name']);
        return $this->repo->store($params);
    }

    public function update($params, $product)
    {
        $params = $this->imageUpload($params, $product);
        $params['slug'] = Str::slug($params['name']);
        return $this->repo->update($params, $product);
    }
}
