<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Dealer;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if ($id = $request->id) $products->where('id', $id);
        if ($name = $request->name) $products->where('pro_name','like', '%'.$name.'%');
        if ($category = $request->category) $products->where('pro_category_id',$category);

        $products = $products->orderByDesc('id')->paginate(20);
        $categories = Category::all();
        $viewData = [
            'products'   => $products,
            'categories' => $categories,
            'query'      => $request->query()
        ];

        return view('product.index', $viewData);
    }

    public function create()
    {
        $categories = $this->getCategoriesSort();
        $dealers = Dealer::all();
        return view('product.create', compact('categories', 'dealers'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token','attribute','keywords','file','pro_sale','pro_file');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();

        $id = Product::insertGetId($data);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $dealers = Dealer::all();

        $viewData = [
            'categories'    => $categories,
            'product'       => $product,
            'dealers' => $dealers
        ];

        return view('product.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $product           = Product::find($id);
        $data               = $request->except('_token','attribute','keywords','file','pro_sale','pro_file');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        $update = $product->update($data);
        return redirect()->route('product.index');
    }


    public function active($id)
    {
        $product = Product::find($id);
        $product->pro_active = ! $product->pro_active;
        $product->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $product = Product::find($id);
        $product->pro_hot = ! $product->pro_hot;
        $product->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) $product->delete();

        return redirect()->back();
    }

    protected function getCategoriesSort()
    {
        $categories = Category::where('c_status', Category::STATUS_ACTIVE)
            ->select('id', 'c_parent_id', 'c_name')->get();

        $listCategoriesSort = [];
        Category::recursive($categories, $parent = 0, $level = 1, $listCategoriesSort);
        return $listCategoriesSort;
    }
}
