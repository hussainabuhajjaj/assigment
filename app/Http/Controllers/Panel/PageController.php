<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Page;

class PageController extends Controller
{


    public function index()
    {
        $pages = Page::all();
        return view('panel.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('panel.pages.create');
    }

    public function store(PageRequest $request)
    {
        $item = Page::create($request->only(Page::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Page::findOrFail($id);
        return view('panel.pages.create', $data);
    }

    public function update(PageRequest $request, $id)
    {
        $item = Page::updateOrCreate(['id' => $id ] , $request->only(Page::FILLABLE))->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);

    }

}
