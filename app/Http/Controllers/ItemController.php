<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{

    public function store(Request $Request)
    {

        $validatedData = $Request->validate([
            'item_date' => 'required',
            'title' => 'required|string',
            'licence' => 'required|string',
            'dimension' => 'required|string',
            'format' => 'nullable',
            'active'=>'nullable|boolean',
            'tag_id' =>'required' ,
        ]);
        $item = new Item;
        $item->item_date = $validatedData['item_date'];
        $item->title = $validatedData['title'];
        $item->licence = $validatedData['licence'];
        $item->dimension = $validatedData['dimension'];
        $item->format = $validatedData['format'];
        $item->active = $Request->has('active') ? 1 : 0;

        $item->tag_id = $validatedData['tag_id'];
        // dd($validatedData['tag_id']);
        // dd($item);/
        $item->save();
    // dd('$item');

    return "success";

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Item created successfully',
    //         'data' => $item,
    //     ], 201);
}
}
