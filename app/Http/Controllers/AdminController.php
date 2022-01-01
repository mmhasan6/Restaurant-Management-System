<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
// User section
    public function user()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Delete the admin
    public function deleteuser($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect('users')->with('status', 'Deleted successfully');
    }
// Food sections
    public function foodmenu()
    {
        $foodmenu = Food::all();
        return view('admin.foodmenu', compact('foodmenu'));
    }

  //Storing new admin users data to DB
    public function uploadfood(Request $request)
    {
      $request->validate([
        'title' => 'required',
        'price' => 'required',
        'food_image' => 'required|image',
        'description' => 'required',
    ]);
    $data = new Food();

    $data->title = $request->title;
    $data->price = $request->price;
    // $data->image = $request->food_image;
    $data->description = $request->description; 

    if ($request->hasFile('food_image')) {
        $file = $request->file('food_image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/foodimages/',$filename);
        
        $data->image = $filename;
    }
    $data->save();

    return redirect('foodmenu')->with('status', 'New item inserted successfully');
    }
    
  //showing Editing Admin form with db data
  public function showupdatepage($id)
  {
      $data = Food::find($id);

      return view('admin.editfood', compact('data'));
  }
  //Updat the admin data
  public function update(Request $request,$id)
  {
    $data = Food::find($id);
    $request->validate([
      'title' => 'required',
      'price' => 'required',
      'food_image' => 'required|image',
      'description' => 'required',
  ]);

  $data->title = $request->title;
  $data->price = $request->price;
  // $data->image = $request->food_image;
  $data->description = $request->description;

    if ($request->hasFile('food_image'))
    {
      $destination = 'uploads/foodimages/'.$data->food_image;
      if (File::exists($destination)) {
          File::delete($destination);
      }
      $file = $request->file('food_image');
      $extention = $file->getClientOriginalExtension();
      $filename = time().'.'.$extention;
      $file->move('uploads/foodimages/',$filename);
      
      $data->image = $filename;
    }
    $data->save();

    return redirect('foodmenu')->with('status', 'Item Updated successfully');
  }

    // Delete the admin
    public function destroy($id)
    {
      $data = Food::find($id);
      $destination = 'uploads/foodimages/'.$data->food_image;
      if (File::exists($destination)) {
          File::delete($destination);
      }
      $data -> delete();
      return redirect('foodmenu')->with('status', 'Item Deleted successfully');
    }


    // reservation
    public function reservation(Request $request)
    {
      // dd($request);
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required|min:10|max:14',
        'guest' => 'required',
        'date' => 'required',
        'time' => 'required',
        'message' => 'required'
    ]);
    $data = new Reservation();

    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->guest = $request->guest;
    $data->date = $request->date;
    $data->time = $request->time;
    $data->message = $request->message;


    $data->save();

    return redirect()->back()->with('status', 'Your reservation added successfully');
    }
  //View reservation
    public function show_reservation()
    {
        $reservation = Reservation::all();
        return view('admin.adminreservation', compact('reservation'));
    }
}
