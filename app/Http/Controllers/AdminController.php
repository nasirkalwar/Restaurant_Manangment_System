<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\food;
use App\Models\chefs;
use App\Models\reservation;
use App\Models\order;
use App\Models\meal;


class AdminController extends Controller
{
    public function users()
    {
        $user=user::all();
        return view('admin.users',compact('user'));
    }
    public function deleteuser($id)
    {
        $user=user::find($id);
        $user->delete();
        return redirect()->back()->with('meassage','User Seccussfully Deleted');
    }
    public function add_food()
    {
        return view('admin.add_food');
    }
    public function add_chef()
    {
        return view('admin.add_chef');
    }
    public function food(Request $request)
    {
        $food=new food();
        $food->title=$request->title;
        $food->description=$request->description;
        $food->category=$request->category;
        $food->price=$request->price;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('foodimage','$filename');
        $food->file=$filename;
        $food->save();
        return redirect()->back()->with('message','New food added Successfully');
    }
    public function chef(Request $request)
    {
        $chef=new chefs();
        $chef->name=$request->name;
        $chef->description=$request->description;
        $chef->category=$request->category;
        $file=$request->file;
        if($file)
        {
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('chefimage','$filename');
            $chef->file=$filename;
        }
        $chef->save();
        return redirect()->back()->with('message','New Chef added Successfully');
    } 
    public function show_food()
    {
        $food=food::all();
        return view('admin.show_food',compact('food'));
    }
    public function show_chef()
    {
        $chef=chefs::all();
        return view('admin.show_chef',compact('chef'));
    }
    public function show_reservation()
    {
        $reservation=reservation::all();
        return view('admin.show_reservation',compact('reservation'));
    }
    public function delete_chef($id)
    {
        $chef=chefs::find($id);
        $chef->delete();
        return redirect()->back()->with('message','Chef Deleted Successfully');;
    }
    public function edit_chef($id)
    {
        $chef=chefs::find($id);
        return view('admin.edit_chef',compact('chef'));
    }
    public function update_chef(Request $request)
    {
        $chef->name=$request->name;
        $chef->description=$request->description;
        $chef->category=$request->category;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('chefimage','$filename');
        $chef->file=$filename;
        $chef->save();
        return redirect()->back()->with('message','Chef Updated Successfully');
    } 
    public function delete_reservation($id)
    {
        $reservation=reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('message','Reservation Deleted Successfully');;
    }
    public function send_mail($id)
    {
        $reservation=reservation::find($id);
        return view('admin.reservation_mail',compact('reservation'));
    }
    public function reject_reservation($id)
    {
        $reservation=reservation::find($id);
        $reservation->status="reject";
        $reservation->save();
        return redirect()->back();
    }
    public function accept_reservation($id)
    {
        $reservation=reservation::find($id);
        $reservation->status="accept";
        $reservation->save();
        return redirect()->back();
    }
    public function show_orders()
    {
        $order=order::all();
        return view('admin.user_orders',compact('order'));
    }
    public function delete_order($id)
    {
        $order=order::find($id);
        $order->delete();
        return redirect()->back()->with('message','Order Deleted Successfully');;
    }
    public function reject_order($id)
    {
        $order=order::find($id);
        $order->status="reject";
        $order->save();
        return redirect()->back();
    }
    public function accept_order($id)
    {
        $order=order::find($id);
        $order->status="accept";
        $order->save();
        return redirect()->back();
    }
    public function meal()
    {
        return view('admin.meal');
    }
    public function add_meal(Request $request)
    {
        $meal=new meal();
        $meal->title=$request->title;
        $meal->description=$request->description;
        $meal->type=$request->type;
        $meal->price=$request->price;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('mealimage','$filename');
        $meal->file=$filename;
        $meal->save();
        return redirect()->back()->with('message','New Meal Atom Added Successfully');
    }
    public function search_user(Request $request)
    {
        $search=$request->search;
        $user=user::where('name','Like','%'.$search.'%')->orwhere('email','Like','%'.$search.'%')->get();
        return view('admin.users',compact('user'));
    }
    public function search_food(Request $request)
    {
        $search=$request->search;
        $food=food::where('title','Like','%'.$search.'%')->orwhere('category','Like','%'.$search.'%')->get();
        return view('admin.show_food',compact('food'));
    }
    public function search_chef(Request $request)
    {
        $search=$request->search;
        $chef=chefs::where('name','Like','%'.$search.'%')->orwhere('category','Like','%'.$search.'%')->get();
        return view('admin.show_chef',compact('chef'));
    }
    public function search_reservation(Request $request)
    {
        $search=$request->search;
        $reservation=reservation::where('name','Like','%'.$search.'%')->get();
        return view('admin.show_reservation',compact('reservation'));
    }
    public function search_order(Request $request)
    {
        $search=$request->search;
        $order=order::where('name','Like','%'.$search.'%')->get();
        return view('admin.user_orders',compact('order'));
    }
}
