<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkLogin()
    {
        if (session()->get('id') == null) {
            echo 'You are logout if you need to login press here <a class="nav-link" href="../login">Login</a>';
            exit();
        }
    }
}
