<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Order\Interfaces\OrderInterface;

class OrderController extends Controller
{

    public function store(Request $request, OrderInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->create($request->all());
            DB::commit();
            return redirect()->route('order.id')->withSuccess('Order Identity Send Successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }


    }

    public function photography()
    {
        return view('pages.forms.photography');
    }

    public function visual_identity()
    {
        return view('pages.forms.visual_id');
    }
}
