<?php

namespace App\Http\Controllers\Panel;

use App\Catagory;
use App\Constants\StatusCodes;
use App\Course;
use App\Http\Requests\ItemRequest;
use App\Item;
use App\Lecture;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {

        return view('panel.index' );
    }

    public function store(ItemRequest $request)
    {
        $data = $request->all();
        $item = Item::create($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);

    }
}
