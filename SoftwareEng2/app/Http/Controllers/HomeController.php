<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Drive;
use App\Driver;
use App\Http\Requests;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function firstpage()
    {
        return view('firstpage');
    }

    public function login()
    {
        return view('auth/login');
    }
    
    public function CheckLogin(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('passwd');
        if (Auth::attempt(array('username' => $username, 'password' => $password)))
        {
            $Result = ['accessGranted' => 1, 'username' => $username];
            //---------------------------Create Login Session
            Session::put('_username',$username);
            $u = User::all()->where('username',$username)->first();
            Session::put('_usertype',$u->type);

        }else
        {
            $Result = ['accessGranted' => 0, 'username' => $username];
        }
        return $Result;
    }

    public function admin()
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');


        $userD =  User::all()->where('username',Session::get('_username'))->first();

        return view('admin/dashboard',compact('userD'));
    }

    public function addDriver()
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');

        $userD =  User::all()->where('username',Session::get('_username'))->first();
        $vehicle = Vehicle::all();
        return view('admin/addDriver',compact('userD'))->with('vehicle',$vehicle);
    }

    public function addnewDriver(Request $request)
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');

        $user   = new User();
        $driver = new Driver();
        if(User::all()->where('username',$request->username)->count() > 0)
           return redirect('/admin/addDriver');
        else if(User::all()->where('email',$request->email)->count() > 0)
            return redirect('/admin/addDriver');
        //TODO: implement This Section with AJAX

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->family = $request->family;
        $user->phonenumber = $request->phonenumber;
        $user->type = 2;
        $user->save();

        $vehicle = Vehicle::all()->where('name',$request->vehicletype)->first();

        $driver->begintime = Carbon::parse($request->starttime)->format('H:i');
        $driver->endtime = Carbon::parse($request->endtime)->format('H:i');
        $driver->hourlywage = $request->hourlywage;
        $driver->plate = $request->plate;
        $driver->userid = $user->id;
        $driver->vehicleid = $vehicle->id;
        $driver->save();

        return back();
    }

    public function viewDriver()
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');


        $userD =  User::all()->where('username',Session::get('_username'))->first();

        $drivers  = User::all()->where('type',2);
        $driversD = Driver::all();

        return view('admin/viewDriver',compact('userD'))->with('drivers',$drivers)->with('driversD',$driversD);
    }

    public function EdidDrivewr(User $id)
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');
        if($id->all()->count() == 0)
            return redirect('/admin/addDriver/view');
        $vehicle = Vehicle::all();
        $userD =  User::all()->where('username',Session::get('_username'))->first();

        $driversD = Driver::all()->where('userid',$id->id)->first();
//        return $userD;
        return view('admin/editDriver')->with('userD',$userD)->with('vehicle',$vehicle)
            ->with('driversD',$driversD)->with('id',$id);
//            ->with('id',$id)
//            ->with('driversD',$driversD)
//            ->with('vehicle',$vehicle);
    }

    public function EdidDrivewrSub(User $id,Request $request)
    {
        //---------------------= CHECK ADMIN SESSION
        if(Session::get('_username') == null && Session::get('_usertype') != 1)     //CHECK LOGIN   SESSION
            return redirect('/login');
        if(!$request->exists('username'))
            return redirect('/admin/addDriver/view/edit/'.$id->id);                 //CHECK REQUEST EXISTING

                                                            //   `USERS` TABLE UPDATE
        $id->name   = $request->name  ;                     //    NAME
        $id->family = $request->family;                     //    FAMILY
        $id->email  = $request->email ;                     //    EMAIL
                                                            //
        if(strlen($request->password)>6)                    //
            $id->password = Hash::make($request->password); //    PASSWORD

        $id->phonenumber = $request->phonenumber;           //    PHONE-NUMBER

        $id->save();                                        //    SAVE CHANGES IN `USERS` TABLE

        $driversD = Driver::all()->where('userid',$id->id)->first();    //   `DRIVERS` TABLE UPDATE
                                                                        //
        $driversD->begintime  = $request->starttime ;                   //   BEGINTIME
        $driversD->endtime    = $request->endtime   ;                   //   BEGINTIME
        $driversD->hourlywage = $request->hourlywage;                   //   HOURLYWAGE
        $driversD->plate      = $request->plate     ;                   //   PLATE
                                                                        //
        $driversD->save();                                              //   SAVE CHANGES IN `DRIVERS` TABLE

        return back();
    }

    public function pop()
    {
        $user = new User();
        $user->username = 'Alasadadas';
        $user->password = Hash::make('sdfasddfsf');
        $user->name = 'Alasdasdsasadai';
        $user->family = 'Madasdsadadi';
        $user->phonenumber = '0918707asd5470';
        $user->email = 'mmasadassfdadss73@yahoo.com';
        $user->type = 3;
        $user->save();

        $driver = Driver::all()->where('userid',3)->first();

        $customer = new Customer();
        $customer->userid = $user->id;
        $customer->save();

        $drive = new Drive();
        $drive->customerid = $customer->id;
        $drive->driverid   = $driver->id;
        $drive->taximeter  = 20;
        $drive->score      = 5;
        $drive->payed      = false;
        $drive->startservice   = Carbon::now();
        $drive->endservice   =  Carbon::parse('2016-06-25 22:23:00.123456');
        $drive->save();

        return $user . "<br/>" . $customer . "<br/>" . $drive;
    }

    public function DeleteDrivewrSub(User $user, Request $request)
    {
//        return $request;
        //---------------------= CHECK ADMIN SESSION
        if(Session::get('_username') == null && Session::get('_usertype') != 1)     //CHECK LOGIN   SESSION
            return redirect('/login');
        if(!$request->exists('username'))
            return redirect('/admin/Drivers/view'.$user->id);                       //CHECK REQUEST EXISTING

        if($request->username != $user->username)
            return redirect('/admin/Drivers/view');
        //TODO: DELETE FROM DRIVES TABLES (^_^)
        $driver = Driver::all()->where('userid',$user->id)->first();
        $driver->delete();
        $user->delete();
        return back();
    }

    public function reportbyuser(User $user)
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');


        $userD    =  User::all()->where('username',Session::get('_username'))->first();

        $driver   = Driver::all()->where('userid',$user->id)->first();

        $services = Drive::all()->where('driverid',$driver->id);
        //return $services ."<br/><br/>". $driver ."<br/><br/>".  $userD;

        $customers = DB::table('drives')->where('driverid',$driver->id)
                        ->join('customers', 'customers.id', '=', 'drives.customerid')
                        ->join('users', 'users.id', '=', 'customers.userid')
                        ->select('users.name', 'users.family','users.email'
                            ,'users.phonenumber', 'drives.score','drives.taximeter'
                            ,'drives.startservice','drives.endservice', 'drives.payed','drives.id')->get();
        $Tscore = 0;
        $Tpayment = 0;
        $i = 0;
        foreach($customers as $customer)
        {
            $Tscore += $customer->score;

            $st =  Carbon::parse($customer->startservice);
            $et =  Carbon::parse($customer->endservice);
             $interval =  $st->diffInHours($et, false);
            if(!$customer->payed)
                $Tpayment += $interval * $driver->hourlywage;
            $i++;
        }

        $driver->score = $Tscore / $i;
        $driver->servicecounter = $i;
        $driver->save();
        return view('admin/reportinvoice',compact('userD'))
            ->with('services' ,$services )
            ->with('driver'   ,$driver   )
            ->with('user'     ,$user     )
            ->with('cusotmers',$customers)
            ->with('Tscore'   ,$Tscore   )
            ->with('Tcount'   ,$i        )
            ->with('Tpayment' ,$Tpayment );
    }

    public function paydriver(User $user, Drive $id)
    {
        //---------------------= Check Admin Session
        if(Session::get('_username') == null && Session::get('_usertype') != 1)
            return redirect('/login');
        $driver = Driver::all()->where('userid',$user->id)->first();
        if($driver->id != $id->driverid)
            return back();
        if(!$id->payed)
            $id->payed = true;
        $id->save();
        return back();
    }
}
