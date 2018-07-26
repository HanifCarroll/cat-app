<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class CatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function create()
    {
        return view('cats.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        // Cat::create([
        //     'name' => request('name'),
        //     'description' => request('description'),
        //     'user_id' => auth()->id()
        // ]);

        if (!empty(auth()->user())) {
            auth()->user()->createCat(
                new Cat(request(['name', 'description']))
            );

            return redirect('/cats');
        }

        return redirect('login');
    }

    public function index()
    {
        $cats = Cat::latest()->get();

        return view('cats.index', compact('cats'));
    }

    public function show(Cat $cat)
    {
        return view('cats.show', compact('cat'));
    }

    public function edit(Cat $cat)
    {
        if (Auth::id() === $cat->user_id) {
            return view('cats.create', compact('cat'));
        }
        return redirect('/cats/' . $cat->id);
    }

    public function update(Cat $cat)
    {
        if (Auth::id() === $cat->user_id) {
            $cat->name = request('name');
            $cat->description = request('description');
            $cat->save();
            return redirect('/cats/' . $cat->id);
        }
        return redirect('/cats/' . $cat->id);

    }

    public function destroy(Cat $cat)
    {
        if (Auth::id() === $cat->user_id) {
            $cat->delete();
            return redirect('/cats');
        }
        return redirect('/cats/' . $cat->id);
    }

}
