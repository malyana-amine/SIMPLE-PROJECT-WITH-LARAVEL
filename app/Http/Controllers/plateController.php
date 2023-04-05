<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plate;

class plateController extends Controller
{

    public function viewAdd()
    {
        return view('addPlate');
    }



    // public function store(Request $request)
    // {
    //     $request = $request->all();
    //     Plate::create($request);
    //     return redirect()->route('dashboard');

    // }



    public function store(Request $request)
{
    // dd($request->input('image'));
    $plate = new plate;
    $plate->name = $request->name;
    $plate->price = $request->price;
    // dd($request->image);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // dd($image);
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destination_path = public_path('images/');
        $image->move($destination_path, $image_name);
        $plate->image = $image_name;
    }
    $plate->save();
    return redirect()->route('dashboard');
    // return redirect()->back()->with('success', 'plate added successfully!');
}


public function index()
{
    // $data = 'ahmes';
    $data = Plate::all();
    return view('dashboard', ['data' => $data]);

    // return view('dashboard')->with('data',$data);
    // return view('')->with('data',$data);
}


public function destroy($id)
{
    $Plate = Plate::find($id);
    $Plate->delete();

    return redirect()->route('dashboard');
}

public function edit($id)
{
    $Plate = Plate::find($id);
    return view('edit' , ['Plate' => $Plate]);
}



public function update(Request $request,$id)
{

    $Plate = Plate::find($id);
    // dd($Plate) ;
    // $request = $request->all();

    // $Plate->name = $request->input('name');
    // $Plate->price = $request->input('price');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // dd($Plate);
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destination_path = public_path('images/');
        $image->move($destination_path, $image_name);
        // dd($image_name);
        $Plate->image = $image_name;
        // dd($Plate->image) ;
        $Plate->update();
        
    }

    $Plate->update(request()->except('image'));
    // $Plate->image = $request->input('image');
    // $Plate->update();

    // Plate::update($request);
    return redirect()->route('dashboard');

}


}
