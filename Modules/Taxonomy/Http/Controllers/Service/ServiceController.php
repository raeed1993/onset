<?php

namespace Modules\Taxonomy\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Http\Requests\Service\Store;
use Modules\Taxonomy\Http\Requests\Service\Update;
use Modules\Taxonomy\Interfaces\Service\ServiceInterface;

class ServiceController extends Controller
{
    public function index(ServiceInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Services';
        $route_name = 'service';
        return view('taxonomy::list', compact('list','table_name','route_name'));
    }

    public function create()
    {
        return view('taxonomy::service.create');
    }

    public function edit(ServiceInterface $interface, $id)
    {
        $service = $interface->findOrFail($id);
        return view('taxonomy::service.show', compact('service'));

    }

    public function update(Update $request, ServiceInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->updateModel($request->validated());
            DB::commit();


            return redirect()->route('admin.service.edit',$request->validated()['taxonomy_id'])->withSuccess('service Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
    public function store(Store $request, ServiceInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->store($request->validated());
            DB::commit();


            return redirect()->route('admin.service.index')->withSuccess('service Created successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
    public function delete(Id $request, ServiceInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->deleteModel($request->validated());
            DB::commit();


            return redirect()->route('admin.service.index')->withSuccess('service Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
