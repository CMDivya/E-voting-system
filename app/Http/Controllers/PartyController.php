<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Party;
use App\Candidate;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Photo;

class partyController extends Controller
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
        //abort_if(!Auth::party()->hasPermission('read-partys'), 403);
        
        $name=$request->name ? $request->name :'';
        $parties = Party::search('name', $name )->paginate(config('setting.pages'));
        return view('party.index')->withparties($parties)->withName($name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(!Auth::party()->hasPermission('create-partys'), 403);
        $parties=Party::all();
        $candidates=Candidate::all();
        return view('party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //abort_if(!Auth::party()->hasPermission('create-partys'), 403);
        $request->validate([
            'name'=>'required|unique:partys,name',
 
             ]);

        $party=new Party;
        $party->name=$request->name;
        if($request->file('logo'))
        {
            $filename = $this->uploadImage($request->file('logo'));

            $party->logo = $filename;
        }

        $party->save();

        return redirect()->route('party.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // abort_if(!Auth::party()->hasPermission('read-partys'), 403);
        $party=Party::find($id);
        $candidates=Candidate::all();
        return view('party.show')->withParty($party)->withCandidates($candidates);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // abort_if(!Auth::party()->hasPermission('update-partys'), 403);
        $party=Party::find($id);
        return view('party.edit')->withParty($party);
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
       // abort_if(!Auth::party()->hasPermission('create-partys'), 403);
      $party= Party::find($id);
      $party->name=$request->name;
        if($request->file('logo'))
        {
            $filename = $this->uploadImage($request->file('logo'));

            $party->logo = $filename;
        }
        $party->save();

        return redirect()->route('party.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $party=Party::find($id);
        $party->delete();
        if($party->logo)
        {
            $this->deleteImage($party->logo);
        }
        return redirect('party');
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
        abort_if(!Auth::party()->hasPermission('delete-blogs'), 403);
        $filename = public_path() . '/' . $image;

        unlink($filename);

    }

}
