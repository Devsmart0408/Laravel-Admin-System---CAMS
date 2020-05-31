<?php

namespace App\Http\Controllers;

use App\Cases;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Cases::all();
        return view('cases.index',compact('cases'))->with('count', Cases::count());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3|max:5',
            'opening_balance' => 'required|numeric',
            'current_balance' => 'required|numeric'
        ]);
        


        $store_data = new Cases([
            'name' => $request->get('name'),
            'opening_balance'=> $request->get('opening_balance'),
            'current_balance'=> $request->get('current_balance'),
          ]);

        $store_data->save();
        return redirect('/cases')->with('success','Data added successfully');
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
        $res_data = Cases::find($id);
        return view('cases.edit', compact('res_data'));
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
        request()->validate([
            'name' => 'required|min:3|max:5',
            'opening_balance' => 'required|numeric',
            'current_balance' => 'required|numeric'
        ]);
        
        $store_data = Array(
                        'name' => $request->get('name'),
                        'opening_balance'=> $request->get('opening_balance'),
                        'current_balance'=> $request->get('current_balance'),
                      );

        Cases::whereId($id)->update($store_data);
        return redirect('/cases')->with('success','Data added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Cases::findOrFail($id);
        $data->delete();
        return redirect('/cases')->with('success', 'Data is successfully deleted');
    }
}
