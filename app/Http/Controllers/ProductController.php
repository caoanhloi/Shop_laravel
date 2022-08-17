<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductHomeService;
use phpDocumentor\Reflection\Types\This;

class ProductController extends Controller
{
    protected $productHomeService;
    public function __construct(ProductHomeService $productHomeService){
        $this->productHomeService = $productHomeService;
    }

    public function index($id, $slug = ''){
        $product = $this->productHomeService->show($id);
        $productsMore = $this->productHomeService->more($id);
        return view('products.content',[
           'title' => $product->name,
           'product' => $product,
            'products' => $productsMore
        ]);
    }
}
