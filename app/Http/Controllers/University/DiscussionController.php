<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussionController extends Controller
{
    //议题
    public function index(){

        return view('University.discussion.index');
    }
}
