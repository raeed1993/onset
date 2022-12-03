<?php

namespace Modules\Taxonomy\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Blog\Store;
use Modules\Taxonomy\Http\Requests\Blog\Update;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Interfaces\Blog\BlogInterface;

class BlogController extends Controller
{
    public function index(BlogInterface $interface)
    {
        $list = $interface->all();
            $table_name = 'Blogs';
            $route_name = 'blog';
        return view('taxonomy::list', compact('list', 'table_name', 'route_name'));
    }

    public function create()
    {
        return view('taxonomy::blog.create');
    }

    public function edit(BlogInterface $interface, $id)
    {
        $blog = $interface->findOrFail($id);
        return view('taxonomy::blog.show', compact('blog'));

    }

    public function update(Update $request, BlogInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->updateModel($request->validated());
            DB::commit();

            return redirect()->route('admin.blog.edit', $request->validated()['taxonomy_id'])->withSuccess('blog Updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function store(Store $request, BlogInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->store($request->validated());
            DB::commit();


            return redirect()->route('admin.blog.index')->withSuccess('Blog Created successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function delete(Id $request, BlogInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();
            return redirect()->route('admin.blog.index')->withSuccess('blog Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }
}
