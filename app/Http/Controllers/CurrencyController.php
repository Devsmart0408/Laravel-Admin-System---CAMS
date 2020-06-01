<?php

namespace App\Http\Controllers;
use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_datas = Currency::all();
        return view('currency.index',compact('res_datas'))->with('count', Currency::count());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currency.create');
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
            'name' => 'required|max:255',
            'code' => 'required|min:3|max:5',
            'buy_code' => 'required|max:255',
            'sell_code' => 'required|max:255',
            'buy_rate_from' => 'required|numeric',
            'buy_rate_to' => 'required|numeric',
            'sell_rate_from' => 'required|numeric',
            'sell_rate_to' => 'required|numeric',
            'current_balance' => 'required|numeric',
            'opening_balance' => 'required|numeric',
            'opening_avg_rate' => 'required|numeric',
            'last_avg_rate' => 'required|numeric',
            'calc_type' => 'required',
            'bs_amount_dec_limit' => 'required|numeric|max:5',
            'avg_rate_dec_limit' => 'required|numeric|max:5',
            'balance_dec_limit' => 'required|numeric|max:5',
            'last_avg_rate_dec_limit' => 'required|numeric|max:5',
            'flag_img' => 'required|image|max:2048',
        ]);

        $flag_img = $request->file('flag_img');
        $flag_img_new_name = rand() . '.' . $flag_img->getClientOriginalExtension();
        $flag_img->move(public_path('images/flag'), $flag_img_new_name);
        
        $form_data = new Currency([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'buy_code' => $request->get('buy_code'),
            'sell_code' => $request->get('sell_code'),
            'buy_rate_from' => $request->get('buy_rate_from'),
            'buy_rate_to' => $request->get('buy_rate_to'),
            'sell_rate_from' => $request->get('sell_rate_from'),
            'sell_rate_to' => $request->get('sell_rate_to'),
            'current_balance' => $request->get('current_balance'),
            'opening_balance' => $request->get('opening_balance'),
            'opening_avg_rate' => $request->get('opening_avg_rate'),
            'last_avg_rate' => $request->get('last_avg_rate'),
            'calc_type' => $request->get('calc_type'),
            'bs_amount_dec_limit' => $request->get('bs_amount_dec_limit'),
            'avg_rate_dec_limit' => $request->get('avg_rate_dec_limit'),
            'balance_dec_limit' => $request->get('balance_dec_limit'),
            'last_avg_rate_dec_limit' => $request->get('last_avg_rate_dec_limit'),
            'flag_img' => $flag_img_new_name
          ]);

        $form_data->save();

        return redirect('/currency')->with('success','Data added successfully');
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
        $res_data = Currency::find($id);
        return view('currency.edit', compact('res_data'));
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
        $flag_img_new_name = $request->hidden_flag_img;
        $flag_img = $request->file('flag_img');

        if($flag_img != "")
        {
            request()->validate([
                'name' => 'required|max:255',
                'code' => 'required|min:3|max:5',
                'buy_code' => 'required|max:255',
                'sell_code' => 'required|max:255',
                'buy_rate_from' => 'required|numeric',
                'buy_rate_to' => 'required|numeric',
                'sell_rate_from' => 'required|numeric',
                'sell_rate_to' => 'required|numeric',
                'current_balance' => 'required|numeric',
                'opening_balance' => 'required|numeric',
                'opening_avg_rate' => 'required|numeric',
                'last_avg_rate' => 'required|numeric',
                'calc_type' => 'required',
                'bs_amount_dec_limit' => 'required|numeric|max:5',
                'avg_rate_dec_limit' => 'required|numeric|max:5',
                'balance_dec_limit' => 'required|numeric|max:5',
                'last_avg_rate_dec_limit' => 'required|numeric|max:5',
                'flag_img' => 'required|image|max:2048',
            ]);

            $flag_img_new_name = rand() . '.' . $flag_img->getClientOriginalExtension();
            $flag_img->move(public_path('images/flag'), $flag_img_new_name);
        }else {
            request()->validate([
                'name' => 'required|max:255',
                'code' => 'required|min:3|max:5',
                'buy_code' => 'required|max:255',
                'sell_code' => 'required|max:255',
                'buy_rate_from' => 'required|numeric',
                'buy_rate_to' => 'required|numeric',
                'sell_rate_from' => 'required|numeric',
                'sell_rate_to' => 'required|numeric',
                'current_balance' => 'required|numeric',
                'opening_balance' => 'required|numeric',
                'opening_avg_rate' => 'required|numeric',
                'last_avg_rate' => 'required|numeric',
                'calc_type' => 'required',
                'bs_amount_dec_limit' => 'required|numeric|max:5',
                'avg_rate_dec_limit' => 'required|numeric|max:5',
                'balance_dec_limit' => 'required|numeric|max:5',
                'last_avg_rate_dec_limit' => 'required|numeric|max:5',
            ]);
        }

        $form_data = Array(
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'buy_code' => $request->get('buy_code'),
            'sell_code' => $request->get('sell_code'),
            'buy_rate_from' => $request->get('buy_rate_from'),
            'buy_rate_to' => $request->get('buy_rate_to'),
            'sell_rate_from' => $request->get('sell_rate_from'),
            'sell_rate_to' => $request->get('sell_rate_to'),
            'current_balance' => $request->get('current_balance'),
            'opening_balance' => $request->get('opening_balance'),
            'opening_avg_rate' => $request->get('opening_avg_rate'),
            'last_avg_rate' => $request->get('last_avg_rate'),
            'calc_type' => $request->get('calc_type'),
            'bs_amount_dec_limit' => $request->get('bs_amount_dec_limit'),
            'avg_rate_dec_limit' => $request->get('avg_rate_dec_limit'),
            'balance_dec_limit' => $request->get('balance_dec_limit'),
            'last_avg_rate_dec_limit' => $request->get('last_avg_rate_dec_limit'),
            'flag_img' => $flag_img_new_name
          );

          Currency::whereId($id)->update($form_data);

        return redirect('/currency')->with('success','Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Currency::findOrFail($id);
        $data->delete();
        return redirect('/currency')->with('success', 'Data is successfully deleted');
    }
}
