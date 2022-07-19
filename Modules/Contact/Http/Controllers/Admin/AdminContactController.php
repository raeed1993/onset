<?php

namespace Modules\Contact\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Contact\Interfaces\Admin\AdminContactInterface;
use Modules\Taxonomy\Http\Requests\Service\Id;

class AdminContactController extends Controller
{
    public function index(AdminContactInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Contacts';
        $route_name = 'contact';
        return view('contact::index', compact('list', 'table_name', 'route_name'));
    }

    public function edit(AdminContactInterface $interface, $id)
    {
        $contact = $interface->findById($id);

        return view('contact::edit', compact('contact'));
    }
    public function delete(Id $request, AdminContactInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();


            return redirect()->route('admin.contact.index')->withSuccess('Message Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function toggle_status(Id $request, AdminContactInterface $interface)
    {
        return response()->json([
            'data' => $interface->toggleStatus($request->validated())
        ]);
    }
}
