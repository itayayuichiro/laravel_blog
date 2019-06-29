<?php

namespace App\Http\Controllers;

use App\Contents;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $token = \Auth::guard('api')->login($user);
        $contents = Contents::where('user_id', '=', $user->id)->get();
        return view('home')->with([
            'user'=>$user,
            'token'=>$token,
            'contents'=>$contents
        ]);
    }
    public function admin()
    {
        if ($_GET['start_date'] && $_GET['end_date']) {
            $logs = \DB::table('log_summary')->get()->where('summary_date', '>=', $_GET['start_date'])->where('summary_date', '<=', $_GET['end_date']);
        }else if($_GET['start_date']){
            $logs = \DB::table('log_summary')->get()->where('summary_date', '>=', $_GET['start_date']);
        }else if($_GET['end_date']){
            $logs = \DB::table('log_summary')->get()->where('summary_date', '<=', $_GET['end_date']);
        }else if(empty($_GET['start_date']) && empty($_GET['start_date'])){
            $logs = \DB::table('log_summary')->get();
        }
        return view('admin')->with([
            'logs'=>$logs
        ]);
    }
}
