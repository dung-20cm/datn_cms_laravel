<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::whereRaw(1);
        if ($request->n)
            $categories->where('c_name','like', "%".$request->n."%");

        $categories = $categories->paginate(10);

        $viewData = [
            'categories' => $categories
        ];

        return view('category.index', $viewData);
    }

    public function create()
    {
        $categories = $this->getCategoriesSort();
        return view('category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $data               = $request->except('_token');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now();

        $id = Category::insertGetId($data);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = $this->getCategoriesSort();
        return view('category.update', compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        $category           = Category::find($id);
        $data               = $request->except('_token');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['updated_at'] = Carbon::now();

        $category->update($data);
        return redirect()->route('category.index');
    }

    public function active($id)
    {
        $category = Category::find($id);
        $category->c_status = ! $category->c_status;
        $category->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $category = Category::find($id);
        $category->c_hot = ! $category->c_hot;
        $category->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) $category->delete();

        return redirect()->back();
    }

    protected function getCategoriesSort()
    {
        $categories = Category::where('c_status', Category::STATUS_ACTIVE)
            ->where('c_parent_id', 0)
            ->select('id', 'c_parent_id', 'c_name')->get();

        $listCategoriesSort = [];
        Category::recursive($categories, $parent = 0, $level = 1, $listCategoriesSort);
        return $listCategoriesSort;
    }
}
