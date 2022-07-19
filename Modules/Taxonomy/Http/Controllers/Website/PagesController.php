<?php

namespace Modules\Taxonomy\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Http\Requests\Website\Pages\Update;
use Modules\Taxonomy\Interfaces\Website\WebsiteInterface;

class PagesController extends Controller
{
    public function edit(WebsiteInterface $interface)
    {
        $data = $interface->all();
        return view('taxonomy::setting.pages', compact('data'));
    }

    public function edit_links(WebsiteInterface $interface)
    {
        $data = $interface->links();
        return view('taxonomy::setting.links', compact('data'));
    }

    public function update(Update $request, WebsiteInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->update_pages($request->validated());
            DB::commit();

            return redirect()->route('admin.website.edit')->withSuccess('Pages Updated successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }


    }

    public function updateSocial(\Modules\Taxonomy\Http\Requests\Website\Links\Update $request, WebsiteInterface $interface)
    {
        try {

            DB::beginTransaction();
            $interface->update_social($request->validated());
            DB::commit();

            return redirect()->route('admin.website.links-edit')->withSuccess('Links Updated successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }


    }


}
