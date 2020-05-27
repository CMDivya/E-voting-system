<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Seat;
use App\State;
use App\District;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Photo;

class SeatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //abort_if(!Auth::Seat()->hasPermission('read-Seats'), 403);
        
        $name=$request->name ? $request->name :'';
        $seats = Seat::search('name', $name )->paginate(config('setting.pages'));
        return view('seat.index')->withSeats($seats)->withName($name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(!Auth::Seat()->hasPermission('create-Seats'), 403);
        $states=State::all();
        $districts=District::all();
        return view('seat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //abort_if(!Auth::Seat()->hasPermission('create-Seats'), 403);
        $request->validate([
            'name'=>'required|unique:seats,name',
            'district_id'=>'required|unique:seats,district_id',
            'state_id'=>'required|unique:seats,state_id',
 
             ]);

        $seat=new Seat;
        $seat->name=$request->name;
        $seat->district_id=$request->district_id;
        $seat->save();

        return redirect()->route('Seat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // abort_if(!Auth::Seat()->hasPermission('read-Seats'), 403);
        $seat=Seat::find($id);
        
        return view('seat.show')->withSeat($seat);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // abort_if(!Auth::Seat()->hasPermission('update-Seats'), 403);
        $seat=Seat::find($id);
        $states=State::all();
        $districts=District::all();
        return view('seat.edit')->withSeat($seat)->withStates($states)->withDistricts($districts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // abort_if(!Auth::Seat()->hasPermission('create-Seats'), 403);
      

       $Seat= Seat::find($id);
        $seat->name=$request->name;
        $seat->district_id=$request->district_id;
        $seat->save();

        return redirect()->route('Seat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $seat=Seat::find($id);
        $seat->delete();
       
        return redirect('seat');
    }
}