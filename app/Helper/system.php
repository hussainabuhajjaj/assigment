<?php

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

function getDatatable($items, $relations = [])
{
    $pagination = request('pagination');
    $query = request('query');

    $search = @$query['generalSearch'];

    $sort = request('sort');


    if ($pagination['perpage'] == -1 || $pagination['perpage'] == null) {
        $pagination['perpage'] = 10;
    }

    $items = $items->with($relations);

    if ($search != null) {
        $items->filter($search);
    }

    if ($sort && count($sort)) {
        $items->orderBy($sort['field'], $sort['sort']);
    } else {
        $items->orderByDesc('created_at');
    }

    $itemsCount = $items->count();
    $items = $items->take($pagination['perpage'])->skip($pagination['perpage'] * ($pagination['page'] - 1))->get();
    $pagination['total'] = $itemsCount;
    $pagination['pages'] = ceil($itemsCount / $pagination['perpage']);

    $data['meta'] = $pagination;
    $data['data'] = $items;
    return $data;
}


function strLimit($str, $limit)
{
    return Str::limit($str, $limit, '...');
}

function locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('common.' . $value['name']);
    }
    return $arr;
}

function roles()
{
    return Role::all();
}

function replace_space_str($str)
{
    return str_replace(' ', '-', $str);
}


function getSetting($key)
{
    return \App\Setting::getSetting($key)->value;
}

?>
