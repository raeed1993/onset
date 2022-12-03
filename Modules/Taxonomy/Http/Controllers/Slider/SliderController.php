<?php

namespace Modules\Taxonomy\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Http\Requests\Slider\Store;
use Modules\Taxonomy\Http\Requests\Slider\Update;
use Modules\Taxonomy\Interfaces\Slider\SliderInterface;

class SliderController extends Controller
{
    public function index(SliderInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Sliders';
        $route_name = 'slider';
//        return view('taxonomy::slider.create', compact('list', 'table_name', 'route_name'));
        return view('taxonomy::list', compact('list', 'table_name', 'route_name'));
    }

    public function create()
    {
        return view('taxonomy::slider.create');
    }

    public function edit(SliderInterface $interface, $id)
    {
        $slider = $interface->findOrFail($id);
        return view('taxonomy::slider.show', compact('slider'));

    }

    public function update(Update $request, SliderInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->updateModel($request->validated());
            DB::commit();

            return redirect()->route('admin.slider.index')->withSuccess('Sliders Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
    public function store(Store $request, SliderInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->store($request->validated());
            DB::commit();

            return redirect()->route('admin.slider.index')->withSuccess('Sliders Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function delete(Id $request, SliderInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();


            return redirect()->route('admin.slider.index')->withSuccess('slider Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
