<?php

namespace App\Http\Controllers;

use App\Models\Custormer;
use Inertia\Inertia;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        return Inertia::render('Index',[
            'customers' => Custormer::all()->map(function($customer){
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                ];
            })
        ]);
    }
    public function create(){
        return inertia::render('Create');
    }

    public function store(Request $request){
        $validated = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:custormers',
           'phone' => 'required|unique:custormers|min:11|max:11',
        ]);
        Custormer::create($validated);
        return redirect()->route('customers.index')->with('message','Customer Created Successfully');
    }

    public function custormer_destroy($id){
        // return $id;
        $customer = Custormer::findOrFail($id)->delete();
        return redirect()->route('customers.index')->with('message', 'Customer deleted successfully');
    }

    public function custormer_edit($id){
        return Inertia::render('Edit',[
            'customer' => Custormer::findOrFail($id),
        ]);
    }

    public function customer_update(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:11',
         ]);
        Custormer::findOrFail($id)->update($validated);
        return redirect()->route('customers.index')->with('message','Customer Updated Successfully');
    }

    public function customer_view($id){
        return Inertia::render('View',[
            'customer' => Custormer::findOrFail($id),
        ]);
    }
}
