<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected function welcomePage()
    {
        return redirect()->route('article.index');
    }
}