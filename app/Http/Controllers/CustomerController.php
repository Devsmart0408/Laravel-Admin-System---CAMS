<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('role', 3)->get();
        return view('customers.index',compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'id_img' => 'required|image|max:2048',
            'company_img' => 'required|image|max:2048',
            'mix_img' => 'required|image|max:2048',
        ]);

        $id_image = $request->file('id_img');
        $id_image_new_name = rand() . '.' . $id_image->getClientOriginalExtension();
        $id_image->move(public_path('images/users'), $id_image_new_name);
            
        $company_image = $request->file('company_img');
        $company_image_new_name = rand() . '.' . $id_image->getClientOriginalExtension();
        $company_image->move(public_path('images/users'), $company_image_new_name);

        $mix_image = $request->file('mix_img');
        $mix_image_new_name = rand() . '.' . $mix_image->getClientOriginalExtension();
        $mix_image->move(public_path('images/users'), $mix_image_new_name);
        
        $customer = new Customer([
            'first_name' => $request->get('first_name'),
            'last_name'=> $request->get('last_name'),
            'email'=> $request->get('email'),
            'password'=> Hash::make($request->get('password')),
            'company_name'=>$request->get('company'),
            'mobile'=>$request->get('mobile'),
            'customer_code'=>$request->get('customer_code'),
            'phone'=>$request->get('phone'), 
            'fax'=>$request->get('fax'), 
            'birthday'=>$request->get('birthday'), 
            'eco_ben'=>$request->get('eco_ben'),
            'address'=>$request->get('address'),
            'city'=>$request->get('city'),
            'country'=>$request->get('country'),
            'name_id'=>$request->get('name_id'),
            'id_type'=>$request->get('id_type'),
            'id_number'=>$request->get('id_number'),
            'place_issue'=>$request->get('place_issue'),
            'place_birthday'=>$request->get('place_birthday'),
            'national'=>$request->get('natinoal'),
            'expire_date'=>$request->get('expire_date'),
            'role'=> 3,
            'id_img'=>$id_image_new_name,
            'company_img'=>$company_image_new_name,
            'mix_img'=>$mix_image_new_name
          ]);

        $customer->save();
        return redirect('/customers')->with('success','Data added successfully');
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
        $res_data = Customer::find($id);
        return view('customers.edit', compact('res_data'));
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

        $id_image_new_name = $request->hidden_id_img;
        $company_image_new_name = $request->hidden_company_img;
        $mix_image_new_name = $request->hidden_mix_img;    

        $id_image = $request->file('id_img');
        $company_image = $request->file('company_img');
        $mix_image = $request->file('mix_img');

        if($id_image != '')
        {
            request()->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|max:255',
                'id_img' => 'required|image|max:2048',
            ]);

            $id_image_new_name = rand() . '.' . $id_image->getClientOriginalExtension();
            $id_image->move(public_path('images/users'), $id_image_new_name);
        } else if($company_image != '') 
        {
            request()->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|max:255',
                'company_img' => 'required|image|max:2048',
            ]);

            $company_image_new_name = rand() . '.' . $id_image->getClientOriginalExtension();
            $company_image->move(public_path('images/users'), $company_image_new_name);
        } else if($mix_image != '')
        {
            request()->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|max:255',
                'company_img' => 'required|image|max:2048',
            ]);

            $mix_image_new_name = rand() . '.' . $mix_image->getClientOriginalExtension();
            $mix_image->move(public_path('images/users'), $mix_image_new_name);
        } else
        {
            request()->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|max:255',
            ]);
        }

        $form_data = array(
            'first_name' => $request->get('first_name'),
            'last_name'=> $request->get('last_name'),
            'email'=> $request->get('email'),
            'password'=> $request->get('password') != "" ? Hash::make($request->get('password')) : $request->get('hidden_password'),
            'company_name'=>$request->get('company'),
            'mobile'=>$request->get('mobile'),
            'customer_code'=>$request->get('customer_code'),
            'phone'=>$request->get('phone'), 
            'fax'=>$request->get('fax'), 
            'birthday'=>$request->get('birthday'), 
            'eco_ben'=>$request->get('eco_ben'),
            'address'=>$request->get('address'),
            'city'=>$request->get('city'),
            'country'=>$request->get('country'),
            'name_id'=>$request->get('name_id'),
            'id_type'=>$request->get('id_type'),
            'id_number'=>$request->get('id_number'),
            'place_issue'=>$request->get('place_issue'),
            'place_birthday'=>$request->get('place_birthday'),
            'national'=>$request->get('natinoal'),
            'expire_date'=>$request->get('expire_date'),
            'role'=> 3,
            'id_img'=>$id_image_new_name,
            'company_img'=>$company_image_new_name,
            'mix_img'=>$mix_image_new_name
          );

        Customer::whereId($id)->update($form_data);

        return redirect('/customers')->with('success','Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return redirect('/customers')->with('success', 'Data is successfully deleted');
    }
}
