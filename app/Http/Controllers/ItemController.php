<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{

    public function index()
    {
        //
        return Item::orderBy('created_at','DESC')->get();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required'
        ]);
        $newItem = new Item($data);
        $newItem->save();

        return $newItem; 
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update($id)
    {
        $item = Item::find($id);
        if ($item) {
            if($item->completed) {
                $item->completed = false;
                $item->completed_at = null;
            }
            else {
                $item->completed = true;
                $item->completed_at = Carbon::now();
            }
            $item->save();
            return $item;
        }
        else {
            return 'Item not found !';
        }
    }   


    public function destroy($id)
    {
        //
        $item=Item::find($id);
        if( $item ){
            $item->delete();
            return response('item deleted', 200);
        }
        else {
            return 'Item not found !';
        }
    }
}
