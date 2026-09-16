<?php

namespace App\Http\Controllers;

class UiController extends Controller
{
    public function companies()
    {
        $data = json_decode(file_get_contents(public_path('data/ui-data.json')), true);

        return view('ui.companies', [
            'companies' => $data['companies'],
        ]);
    }

    public function posts()
    {
        $data = json_decode(file_get_contents(public_path('data/ui-data.json')), true);

        return view('ui.posts', [
            'posts' => $data['posts'],
        ]);
    }
}
