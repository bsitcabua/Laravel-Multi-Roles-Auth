<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        try {

            return view('admin.profile.index');

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function edit($id)
    {
        try {

            User::findOrFail($id);

            return view('admin.profile.edit');

        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
