<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function extraCurriculum()
    {
        return view('superAdmin/createExtraCurriculum');
    }

    public function createHouse()
    {
        return view('superAdmin/createHouse');
    }
}
