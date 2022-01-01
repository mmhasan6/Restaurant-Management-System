<?php

namespace App\Http\Controllers;

use App\Models\FoodChef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FoodChefController extends Controller
{
    // Show chef
    public function showchef()
    {
        $showchef = FoodChef::all();
        return view('admin.chef.adminchef', compact('showchef'));
    }

  //Storing new admin users data to DB
    public function uploadchef(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'speciality' => 'required',
        'profile_image' => 'required|image'
      ]);
      $data = new FoodChef();

      $data->name = $request->name;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->address = $request->address;
      $data->speciality = $request->speciality;

      if ($request->hasFile('profile_image')) {
          $file = $request->file('profile_image');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'.$extention;
          $file->move('uploads/chefimage/',$filename);
          
          $data->image = $filename;
      }
      $data->save();

      return redirect('chef')->with('status', 'New item inserted successfully');
    }
    
  //showing Editing Admin form with db data
  public function showupdatepage($id)
  {
      $data = FoodChef::find($id);

      return view('admin.chef.editchef', compact('data'));
  }
  //Updat the admin data
  public function update_chef(Request $request,$id)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'address' => 'required',
      'speciality' => 'required',
      'profile_image' => 'required|image'
    ]);
    $data = FoodChef::find($id);

    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;
    $data->speciality = $request->speciality;

    if ($request->hasFile('profile_image'))
    {
      $destination = 'uploads/chefimage/'.$data->profile_image;
      if (File::exists($destination)) {
          File::delete($destination);
      }
      $file = $request->file('profile_image');
      $extention = $file->getClientOriginalExtension();
      $filename = time().'.'.$extention;
      $file->move('uploads/chefimage/',$filename);
      
      $data->image = $filename;
    }
    $data->save();

    return redirect('chef')->with('status', 'Updated successfully');
  }

    // Delete the admin
    public function destroy($id)
    {
      $data = FoodChef::find($id);
      $destination = 'uploads/chefimage/'.$data->profile_image;
      if (File::exists($destination)) {
          File::delete($destination);
      }
      $data -> delete();
      return redirect()->back()->with('status', 'Deleted successfully');
    }
}
