<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use Validator;

class ItemManagerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Items::all();

        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[

            'text' => 'required',
            'body' => 'required'
        ]);
        
        if($validator->fails())
        {
            $response = ["response" => $validator->messages(), "success" => false];
            return $response;
        }else
        {
            $item = new Items();

            $item->text = $request->input('text');
            $item->body = $request->input('body');

            $item->save();

            return response()->json($item);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

            'text' => 'required',
            'body' => 'required'
        ]);
        
        if($validator->fails())
        {
            $response = ["response" => $validator->messages(), "success" => false];
            return $response;
        }else
        {
            $item = Items::find($id);

            $item->text = $request->input('text');
            $item->body = $request->input('body');

            $item->save();

            return response()->json($item);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Items::find($id);

        $items->delete();

        $response = ["response" => "item is deleted", "success" => true];

        return $response;
    }
}
