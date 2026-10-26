<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function status()
    {
        return response()->json([
            'status' => 'API VERSION 2 is running'
        ]);
    }
}
