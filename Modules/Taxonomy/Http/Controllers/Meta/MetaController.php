<?php

namespace Modules\Taxonomy\Http\Controllers\Meta;

use Modules\Taxonomy\Interfaces\Meta\MetaInterface;

class MetaController
{
    public function index(MetaInterface $interface)
    {
        $list = $interface->all();
        $table_name = 'Meta';
        $route_name = 'meta';
        return view('taxonomy::list', compact('list','table_name','route_name'));
    }

    public function edit(MetaInterface $interface, $id)
    {
        $interface->findOrFail($id);
        return view('taxonomy::meta.edit');
    }

}
