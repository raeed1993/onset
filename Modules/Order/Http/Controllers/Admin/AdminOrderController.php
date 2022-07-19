<?php

namespace Modules\Order\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Order\Interfaces\Admin\AdminOrderInterface;
use Modules\Taxonomy\Http\Requests\Service\Id;

class AdminOrderController extends Controller
{
    public function index(AdminOrderInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Orders';
        $route_name = 'order';
        return view('order::index', compact('list', 'table_name', 'route_name'));
    }

    public function show(AdminOrderInterface $interface, $id)
    {
        $order = $interface->findById($id);

        return view('order::show', compact('order'));
    }
    public function delete(Id $request, AdminOrderInterface $interface)
    {
        try {
            DB::beginTransaction();
            $interface->delete($interface->findOrFail($request['taxonomy_id']));
            DB::commit();


            return redirect()->route('admin.order.index')->withSuccess('Order Deleted successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function toggle_status(Id $request, AdminOrderInterface $interface)
    {
        return response()->json([
            'data' => $interface->toggleStatus($request->validated())
        ]);
    }
}
