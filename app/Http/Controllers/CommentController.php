<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cat;

class CommentController extends Controller
{
    public function store(Cat $cat)
    {
        $this->validate(request(), ['body' => 'required']);

        $cat->addComment(request('body'), \Auth::user()->id);

        return back();
    }
}
