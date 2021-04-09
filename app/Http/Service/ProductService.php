<?php


namespace App\Http\Service;


use App\Http\Repository\ProductRepository;
use App\Http\Service\BaseService;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function getById($id)
    {
        return $this->productRepo->getById($id);
    }

    public  function getInstance()
    {
        return $this->productRepo->getInstance();
    }
    public function store($request)
    {
        $product = new Product();
        $product->fill($request->all());
        $path = $this->updateLoadFile($request, 'image', 'products');
        $product->image = $path;
        $this->productRepo->store($product);

    }

    public function update($id,$request)
    {
        $product = $this->productRepo->getById($id);
        $product->fill($request->all());
        if ($request->hasfile('image')) {
            Storage::disk('public')->delete($product->img);
            $path = $this->updateLoadFile($request, 'image', 'products');
            $product->image = $path;
        }
        $this->productRepo->update($product);

    }

    function delete($id)
    {
        $product = $this->productRepo->getById($id);
        $this->productRepo->delete($product);
    }


}
