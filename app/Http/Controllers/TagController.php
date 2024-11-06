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
        return 'suceess';
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id); 
        return view('categories.editCategory', ['tags' => $tag]);
    }

    public function update(Request $request, $id)
    {
        // تحقق من صحة البيانات
        $validatedData = $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        // ابحث عن السجل بواسطة ID
        $tag = Tag::findOrFail($id);
        // قم بتحديث البيانات
        $tag->title = $validatedData['tag'];
        $tag->save();
        // إعادة توجيه مع رسالة نجاح
        return redirect()->route('tag.edit', $id)->with('success', 'تم تحديث التصنيف بنجاح!');
    }

}
