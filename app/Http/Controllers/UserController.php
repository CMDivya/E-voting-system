<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Config;
use App\User;
use App\State;
use App\District;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Photo;

class UserController extends Controller
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
        //abort_if(!Auth::user()->hasPermission('read-users'), 403);
        
        $name=$request->name ? $request->name :'';
        $users = User::search('name', $name )->paginate(config('setting.pages'));
        return view('user.index')->withUsers($users)->withName($name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(!Auth::user()->hasPermission('create-users'), 403);
        $states=State::all();
        $districts=District::all();
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //abort_if(!Auth::user()->hasPermission('create-users'), 403);
        $request->validate([
            'name'=>'required|unique:users,name',
            'email'=>'required|unique:users,email',
            'adhaar_no'=>'required|max:12|unique:users,adhaar_no',
            'contact_no'=>'required|max:10|unique:users,contact_no',
            'district_id'=>'required|unique:users,district_id',
            'state_id'=>'required|unique:users,state_id',
            'address'=>'required|max:300',
            'gender'=>'required',
 
             ]);

        $user=new user;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->adhaar_no=$request->adhaar_no;
        $user->contact_no=$request->contact_no;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->state_id=$request->state_id;
        $user->district_id=$request->district_id;
        if($request->file('image'))
        {
            $filename = $this->uploadImage($request->file('image'));

            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // abort_if(!Auth::user()->hasPermission('read-users'), 403);
        $user=User::find($id);
        
        return view('user.show')->withUser($user);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // abort_if(!Auth::user()->hasPermission('update-users'), 403);
        $user=User::find($id);
        $states=State::all();
        $districts=District::all();
        return view('user.edit')->withUser($user)->withStates($states)->withDistricts($districts);
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
       // abort_if(!Auth::user()->hasPermission('create-users'), 403);
      

       $user= User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->adhaar_no=$request->adhaar_no;
        $user->contact_no=$request->contact_no;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->state_id=$request->state_id;
        $user->district_id=$request->district_id;
        if($request->file('image'))
        {
            $filename = $this->uploadImage($request->file('image'));

            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $user=User::find($id);
        $user->delete();
        if($user->image)
        {
            $this->deleteImage($user->image);
        }
        return redirect('user');
    }
    public function uploadImage($image){

        //generating random string from current time
        $random_name = time();
    //getting image extension
        $extension = $image->getClientOriginalExtension();

        //generating new image name
        $filename = time() . '.' . $extension;

        //Saving image here
        Photo::make($image)->save(public_path('/' . $filename));

        return $filename;
    }

    public function deleteImage($image)
    {
        abort_if(!Auth::user()->hasPermission('delete-blogs'), 403);
        $filename = public_path() . '/' . $image;

        unlink($filename);

    }
}
