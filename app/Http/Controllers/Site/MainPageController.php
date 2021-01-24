<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $data = $this->necessarily();
        $data['pageName'] = '/';

        $data['popularProducts'] = Product::withData()->orderBy('popular')->take(4)->get();

        return view('site.mainpage', $data);
    }
}
