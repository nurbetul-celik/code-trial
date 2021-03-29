<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct()
    {
        $product = Product::where('status','active')->orderByDesc('id')->paginate(5);
        \Illuminate\Support\Facades\View::share('product',$product);
        return \view('backend.product');
    }
    public function getProductForm($id = 0)
    {
        $entryProduct = new Product();
        if ($id > 0) {
            $entryProduct = \App\Models\Product::find($id);
        }
        \Illuminate\Support\Facades\View::share('entryProduct', $entryProduct);
        return view('backend.product-new');
    }
    public function postProductCreated(Request $inputs)
    {
        if (isset($inputs->id) && $inputs->id) {
            return $this->updateProduct($inputs);
        } else {
            return $this->createProduct($inputs);
        }
    }

    protected function updateProduct($data)
    {
        \App\Models\Product::select('id')->whereId($data['id'])
            ->update([
                'product_code' => $data['product_code'],
                'product_name' => $data['product_name'],
                'product_unitprice' => $data['product_unitprice'],
                'product_quantity' => $data['product_quantity']
            ]);
        return redirect()->back();
    }
    protected function createProduct($data)
    {
        \App\Models\Product::create([
            'product_code' => $data['product_code'],
            'product_name' => $data['product_name'],
            'product_unitprice' => $data['product_unitprice'],
            'product_quantity' => $data['product_quantity']
        ]);
        return redirect()->back();
    }
    public function getDeleteProduct($id)
    {
        \App\Models\Product::deleted($id);
        \App\Models\Product::whereId($id)->update(['status' => 'deleted']);
        return redirect()->route('get-product');
    }
}
