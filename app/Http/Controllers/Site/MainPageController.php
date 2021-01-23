<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $data = $this->necessarily();
        $data['pageName'] = '/';

        return view('site.mainpage', $data);
    }
}
