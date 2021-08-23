<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Product;
class ProductRepository {
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function getRelation($relation)
    {
        $model = $this->getQuery();
        return $model->with($relation);
    }

    public function getCat()
    {
        return Category::get();
    }

    public function store($params)
    {
        return $this->model->create($params);
    }

    public function update($params, $product)
    {
        return $product->update($params);
    }
}
