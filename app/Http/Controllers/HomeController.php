<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\food;
use App\Models\reservation;
use App\Models\cart;
use App\Models\order;
use App\Models\chefs;
use App\Models\meal;


class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
       {  
        $food=food::all();
        if(Auth::user()->usertype=='0')            
            {
                $chef=chefs::paginate(3);       
                $user_id=Auth::id();
                $count=cart::where('user_id',$user_id)->count();
                $meal=meal::paginate(6);
                return view('home.userpage',compact('food','count','chef','meal'));
            }
            else
            {
                $total_order=order::all()->count();
                $total_users=user::where('usertype','=','0')->get()->count();
                $total_inprocess=order::where('status','=','in process')->get()->count();
                $total_pending=order::where('status','=','pending')->get()->count();
                $total_breakfast=meal::where('type','=','Break-Fast')->get()->count();
                $total_lanch=meal::where('type','=','Lanch')->get()->count();
                $total_dinner=meal::where('type','=','Dinner')->get()->count();
                $total_reservation=reservation::all()->count();
                $total_chef=chefs::all()->count();
                $total_food=food::all()->count();
                return view('admin.adminpage',compact('total_users','total_order','total_chef','total_reservation','total_food','total_inprocess','total_pending','total_breakfast','total_dinner','total_lanch'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        $food=food::all();
        $chef=chefs::paginate(3);
        $user_id=Auth::id();
        $count=cart::where('user_id',$user_id)->count();
        $meal=meal::paginate(6);
        return view('home.userpage',compact('food','count','chef','meal'));
    }
    public function reservation(Request $request)
    {
        if(Auth::id())
        {
            $reservation=new reservation();
            $reservation->name=$request->name;
            $reservation->email=$request->email;
            $reservation->phone=$request->phone;
            $reservation->guests=$request->guests;
            $reservation->date=$request->date;
            $reservation->time=$request->time;
            $reservation->message=$request->message;
            $reservation->userid=Auth::user()->id;
            $reservation->status='In pending';
            $reservation->save();
            return redirect()->back()->with('meassage','Reservation Message Successfully Send');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function my_reservation()
    {
        if(Auth::id())
        {
            $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();    
            $userid= Auth::user()->id;
            $reservation = reservation::where('userid',$userid)->get();
            return view('home.my_reservation',compact('reservation','count'));
        }
        else
        {
            return redirect()->back();
        } 
    }
    public function cancel_reservation($id)
    {
        $reservation=reservation::find($id);
        $reservation->status="canceled";
        $reservation->save();
        return redirect()->back();
    }
    public function cart()
    {
        $cart =cart::all();
        $user_id=Auth::id();
        $count=cart::where('user_id',$user_id)->count();
        return view('home.cart',compact('cart','count'));
    }
    public function about()
    {
        $user_id=Auth::id();
        $count=cart::where('user_id',$user_id)->count();
        return view('home.aboutus',compact('count'));
    }
    public function all_show_chefs()
    {
        $chef=chefs::paginate(6);
        $user_id=Auth::id();
        $count=cart::where('user_id',$user_id)->count();
        return view('home.all_chefs_show',compact('chef','count'));
    }
    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $cart = new cart();
            $cart->food_id=food::find($id)->id;
            $cart->food_name=food::find($id)->title;
            $cart->user_id=Auth::user()->id;
            $cart->user_name=Auth::user()->name;
            $cart->price=$request->price;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back()->with('meassage','Added Successfully');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back()->with('meassage','Remove food Successfully');
    }
    public function book_reservation()
    {
        $user_id=Auth::id();
        $count=cart::where('user_id',$user_id)->count();
        return view('home.book_reservations',compact('count'));
    }
    public function confirm_order(Request $request)
    {
        foreach($request->foodname as $key =>$foodname)
        {
            $order = new order();
            $order->name=$request->name;
            $order->phone=$request->number;
            $order->address=$request->address;
            $order->foodname=$foodname;
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];
            $order->status='In process';            
            $order->save();
        }
        return redirect()->back()->with('meassage','Order Send Successfully');
            
    }
    public function all_meal_menu()
    {
        $meal=meal::paginate(10);
        return view('home.all_meal_menu',compact('meal'));
    }
}

