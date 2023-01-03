<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Dealer;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DealerController extends Controller
{
    public function index(Request $request)
    {
        $dealers = Dealer::whereRaw(1);
        if ($request->n)
            $dealers->where('name','like','%'.$request->n.'%');

        $dealers = $dealers->orderByDesc('id')->paginate(10);

        $viewData = [
            'dealers' => $dealers,
            'query'      => $request->query()
        ];

        return view('dealer.index', $viewData);
    }

    public function create()
    {
        return view('dealer.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at']   = Carbon::now();

        $id = Dealer::insertGetId($data);
        return redirect()->route('dealer.index');
    }

    public function edit($id)
    {
        $dealer = Dealer::findOrFail($id);

        $viewData = [
            'dealer'    => $dealer,
        ];

        return view('dealer.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $dealer           = Dealer::find($id);
        $data               = $request->except('_token');
        $data['updated_at'] = Carbon::now();

        $dealer->update($data);
        return redirect()->route('dealer.index');
    }

    public function delete($id)
    {
        $dealer = Dealer::find($id);
        if ($dealer) $dealer->delete();

        return redirect()->back();
    }
}
