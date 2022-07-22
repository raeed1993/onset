<?php

namespace Modules\Taxonomy\Http\Controllers\ClientBig;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\ClientBig\Store;
use Modules\Taxonomy\Http\Requests\ClientBig\Update;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Interfaces\ClientBig\ClientBigInterface;

class ClientBigController extends Controller
{
    public function index(ClientBigInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Clients Bigs';
        $route_name = 'client-big';
        return view('taxonomy::list', compact('list','table_name','route_name'));
    }
    public function create()
    {
        return view('taxonomy::client-big.create');
    }

    public function edit(ClientBigInterface $interface, $id)
    {
        $client = $interface->findOrFail($id);

        return view('taxonomy::client-big.show', compact('client'));

    }

    public function update(Update $request, ClientBigInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->updateModel($request->validated());
            DB::commit();


            return redirect()->route('admin.client-big.edit',$request->validated()['taxonomy_id'])->withSuccess('client Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function store(Store $request, ClientBigInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->store($request->validated());
            DB::commit();


            return redirect()->route('admin.client-big.index')->withSuccess('client Created successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function delete(Id $request, ClientBigInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();


            return redirect()->route('admin.client-big.index')->withSuccess('client Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
