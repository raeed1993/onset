<?php

namespace Modules\Taxonomy\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Project\Store;
use Modules\Taxonomy\Http\Requests\Project\Update;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Interfaces\Portfolio\ProjectInterface;

class ProjectController extends Controller
{
    public function index(ProjectInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Projects';
        $route_name = 'project';
        return view('taxonomy::list', compact('list', 'table_name', 'route_name'));
    }

    public function create(ProjectInterface $interface)
    {
        $services = $interface->services();
        return view('taxonomy::portfolio.create', compact('services'));
    }

    public function edit(ProjectInterface $interface, $id)
    {
        $project = $interface->findOrFail($id);
        $services = $interface->services();

        return view('taxonomy::portfolio.show', compact('project','services'));

    }

    public function update(Update $request, ProjectInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->updateModel($request->validated());
            DB::commit();


            return redirect()->route('admin.project.edit', $request->validated()['taxonomy_id'])->withSuccess('project Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function store(Store $request, ProjectInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->store($request->validated());
            DB::commit();


            return redirect()->route('admin.project.index')->withSuccess('project Created successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function delete(Id $request, ProjectInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();


            return redirect()->route('admin.project.index')->withSuccess('project Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
