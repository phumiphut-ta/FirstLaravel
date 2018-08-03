<?php

namespace App\Http\Controllers;

use App\Customer;
use Gate;
use Illuminate\Http\Request;
use PHPUnit\Runner\Exception;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // $query = request()->all();

        // if (isset($query['sort'])) {
        //     $filedName =$query['sort'];
           
        //     $model = Customer::orderBy($filedName);
        // } else {
           
        //     $model = Customer::orderBy('id');
        // }
        // $customers=$model->paginate(5);

        // $customers = Customer::has('orders')->paginate(10); //แสดงเฉพาะ Customer ที่มี Order เท่านั้น
        // return view('customers.index')
        //     ->with(['x' => $customers]);

        $customers = Customer::with('orders')->get();
        return 'json';
        // return response()->json($customers);
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

        $inputs = request()->all();
        $rules = [
            'first_name' => 'required|min:5',
            'last_name' => 'required|min:8',
        ];

        $messages = [
            'required' => 'กรุณาใน:attribute กรอกข้อมูล',
            'min' => ':attributeต้องมีอย่างน้อย :min ตัวอักษร',
        ];

        $attributes = [
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
        ];
        $request->validate($rules, $messages, $attributes);
        try {
            $c = new Customer;
            $c->first_name = $inputs['first_name'];
            $c->last_name = $inputs['last_name'];
            $c->save();
            session()->flash('status', 'New customer has been created');
            return redirect('/customer');
        } catch (Exception $e) {
            return $e->getMessage();
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
        $c = Customer::find($id);
        return view('customers.show')
                ->with(['c' => $c]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(gate::allows('customer-edit'))
        {
            $c = Customer::find($id);
            return view('customers.edit')
             ->with(['c' => $c]);
        }else{
            return 'You\ are not Authorize.';
        }
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
        try {
            $c = Customer::find($id);
            $customer = request()->all();
            $c->first_name = $customer['first_name'];
            $c->last_name = $customer['last_name'];
            $c->save();

            session()->flash('status', "customer $id has been update");
            return redirect('/customer');
        } catch (Exception $e) {
            $e->getMessage();
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
        try {
            $c = Customer::find($id);
            $c->delete();
            session()->flash('status', "customer $id has been deleted");
            return redirect('/customer');
        } catch (Exception $e) {
            $e->getMessage();
        }

    }
}
