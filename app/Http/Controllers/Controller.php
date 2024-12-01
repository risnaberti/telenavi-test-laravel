<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

// extends \Illuminate\Routing\Controller
abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
