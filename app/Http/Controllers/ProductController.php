<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Service\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productSer;
    protected $category;
    public function __construct(ProductService $productService,Category $category)
    {
        $this->productSer = $productService;
        $this->category = $category;
    }
    function index()
    {
        $products = $this->productSer->getAll();
        return view('admin.home',compact('products'));
    }
    function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }
    function store(CreateProductRequest $request)
    {
        $this->productSer->store($request);
        return redirect()->route('products.index');
    }

    function edit($id)
    {
        $product = $this->productSer->getById($id);
        $categories = $this->category->get();
        return view('admin.products.edit',compact('product','categories'));
    }
    function update($id, CreateProductRequest $request)
    {
        $this->productSer->update($id, $request);
        return redirect()->route('products.index');

    }
    function delete($id)
    {
        $this->productSer->delete($id);
        return redirect()->route('products.index');
    }

}
