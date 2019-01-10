<?php
namespace App\Http\Controllers\Superadmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class SuperadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.dashboard');
    }

    /**
     * Logout for superadmin
     */
    public function logout(Request $request)
    {
        Auth::guard('superadmin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('superadmin');
    }
}