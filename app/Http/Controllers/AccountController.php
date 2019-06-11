<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        $sources = Group::all();
        return view('account.index', compact('sources'));
    }
}
