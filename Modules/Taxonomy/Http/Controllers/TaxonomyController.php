<?php

namespace Modules\Taxonomy\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Taxonomy\Http\Requests\Service\Id;
use Modules\Taxonomy\Interfaces\RepositoryInterface;
use Modules\Taxonomy\Interfaces\Website\WebsiteInterface;

class TaxonomyController extends Controller
{

    public function toggle_status(Id $request, RepositoryInterface $interface)
    {
        return response()->json([
            'data' => $interface->toggleStatus($request->validated())
        ]);
    }
}
