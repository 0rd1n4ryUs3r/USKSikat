<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Jika user sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        // Jika belum login, tampilkan landing page
        return view('welcome');
    }

    /**
     * Display about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display contact page.
     */
    public function contact()
    {
        return view('contact');
    }
}
