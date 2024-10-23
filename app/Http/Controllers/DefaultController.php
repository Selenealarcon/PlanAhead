<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DefaultController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function home() {
        return view('home');
    }
}
