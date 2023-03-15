<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DateTime;


class UserController extends Controller
{
    public function create()
    {
        return view('employee');
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->save();
        return redirect()->back()->with('success', 'Employee Registered Successfully');
    }

    public function checkin()
    {

        $user = User::all();
        return view('checkin', compact('user'));
    }

    public function checkin_store(Request $request)
    {


        $user = new Employee();
        $user->user_id = $request->user_id;
        if ($request->check == 1) {
            $user->checkin = Carbon::now()->timezone('Asia/Kolkata');
        } else {
            $user->checkout = Carbon::now()->timezone('Asia/Kolkata');
        }

        $user->save();
        return redirect()->back()->with('success', 'You Have Check-In Successfully');

    }



    public function User_table()
    {
        $data = User::all();
        $user = Employee::with('user')->get();
        return view('table', compact('user', 'data'));
    }

    public function checkout($id)
    {
        $data = User::all();
        $user = Employee::find($id);
        return view('checkout', compact('user', 'data'));
    }


    public function checkout_store(Request $request, $id)
    {
        $user = Employee::find($id);
        $user->user_id = $request->user_id;
        if ($request->check == 1) {
            $user->checkin = Carbon::now()->timezone('Asia/Kolkata');
        } else {
            $user->checkout = Carbon::now()->timezone('Asia/Kolkata');
        }
        $user->save();
        return redirect()->route('employee.table')->with('success', 'You Have Check-Out Successfully!!');
    }



    public function search(Request $request)
    {
        $data = User::all();
        $user = Employee::where('user_id', $request->user_id)->with('user')->get();
        return view('table', compact('user', 'data'));
    }
}
