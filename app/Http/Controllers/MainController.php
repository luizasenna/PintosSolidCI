<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    const entity_status = [
        0 => 'Ativo',
        1 => 'Inativo'
    ];

    public function main_index($source, $entity_name, $search_property) {

        $filter = '';

        if ( Request::exists('filter') ) {
            $filter = Request::input('filter');
        }

        $entities = $source::where($search_property, 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->get();

        return view('admin.'.$this->$entity_name.'.index', [ 'entities' => $entities, 'filter' => $filter, 'entity_status' => self::entity_status ]);
    }

    protected function main_create($entity_name) {
        return view('admin.'.$entity_name.'.insere', ['entity_status' => self::entity_status]);
    }
}
