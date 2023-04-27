<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function redirect()
    {
        $user=Auth::id();
        if($user)
        {
            return view('admin.main');
        }
        else
        {
            return redirect('login');
        }
    }
    public function add_class()
    {
        $user=Auth::id();
        if($user)
        {
            return view('admin.addClass');
        }
        else
        {
            return redirect('login');
        }
    }
    public function student()
    {
        $user=Auth::id();
        if($user)
        {
            return view('admin.student');
        }
        else
        {
            return redirect('login');
        }
    }
    public function attendance()
    {
        $user=Auth::id();
        if($user)
        {
            return view('admin.attendance');
        }
        else
        {
            return redirect('login');
        }
    }


}
