<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $Request)
    {
        $validatedData = $Request->validate([
            'tag' => 'required|string|max:255',
            // dd($Request->all()),
        ]);
        $tag = new Tag();
        $tag->title = $validatedData['tag'];
        $tag->save();
        return "success";
    }

    public function edit(Tag $Tag)
    {
        return view('categories.editCategory', compact('Tag'));
    }

}
