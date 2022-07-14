<?php

namespace Modules\Taxonomy\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Client\Store;
use Modules\Taxonomy\Http\Requests\Client\Update;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Interfaces\Client\ClientInterface;

class ClientController extends Controller
{
    public function index(ClientInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Clients';
        $route_name = 'client';
        return view('taxonomy::list', compact('list','table_name','route_name'));
    }
    public function create()
    {
        return view('taxonomy::client.create');
    }

    public function edit(ClientInterface $interface, $id)
    {
        $client = $interface->findOrFail($id);

        return view('taxonomy::client.show', compact('client'));

    }

    public function update(Update $request, ClientInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->updateModel($request->validated());
            DB::commit();


            return redirect()->route('admin.client.edit',$request->validated()['taxonomy_id'])->withSuccess('client Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function store(Store $request, ClientInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->store($request->validated());
            DB::commit();


            return redirect()->route('admin.client.index')->withSuccess('client Created successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function delete(Id $request, ClientInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();


            return redirect()->route('admin.client.index')->withSuccess('client Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
