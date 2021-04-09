<?php


namespace App\Http\Repository;


use App\Models\Product;

class ProductRepository
{
    function getAll()
    {
        return Product::all();
    }

    function getById($id)
    {
        return Product::findOrFail($id);
    }

    function getInstance()
    {
        return new Product();
    }
    function store($product)
    {
        $product->save();
    }
    function update($product)
    {
        $product->update();
    }

    function delete($product)
    {
        $product->delete();
    }

}
