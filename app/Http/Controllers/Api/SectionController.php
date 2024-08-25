<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ListSectionsRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;

class SectionController extends Controller
{
    public function __invoke(ListSectionsRequest $request)
    {

        $sections = Section::where('group_id', $request->group_id)->get();

        return SectionResource::collection($sections);
    }
}