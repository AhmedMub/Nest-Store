<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    public function adminRegistration()
    {
        return view('admin.pages.register');
    }

    public function show()
    {
        return view('admin.pages.admins-list');
    }
}
