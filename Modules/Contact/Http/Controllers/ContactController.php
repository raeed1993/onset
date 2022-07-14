<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Contact\Interfaces\ContactInterface;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, ContactInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->store($request->all());
            DB::commit();
            return redirect()->route('contact.page')->withSuccess('Content Send Successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }


    }


}
