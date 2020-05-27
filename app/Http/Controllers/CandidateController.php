<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Party;
use App\Candidate;
use App\State;
use App\District;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Photo;

class CandidateController extends Controller
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
        //abort_if(!Auth::Candidate()->hasPermission('read-Candidates'), 403);
        
        $name=$request->name ? $request->name :'';
        $candidates = Candidate::search('name', $name )->paginate(config('setting.pages'));
        return view('candidate.index')->withCandidates($candidates)->withName($name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(!Auth::Candidate()->hasPermission('create-Candidates'), 403);
        $party=Party::all();
        $states=State::all();
        $districts=District::all();
        return view('candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //abort_if(!Auth::Candidate()->hasPermission('create-Candidates'), 403);
        $request->validate([
            'name'=>'required|unique:candidates,name',
            'email'=>'required|unique:candidates,email',
            'adhaar_no'=>'required|max:12|unique:candidates,adhaar_no',
            'contact_no'=>'required|max:10|unique:candidates,contact_no',
            'district_id'=>'required|unique:candidates,district_id',
            'state_id'=>'required|unique:candidates,state_id',
            'address'=>'required|max:300',
            'gender'=>'required',
 
             ]);

        $candidate=new Candidate;
        $candidate->name=$request->name;
        $candidate->email=$request->email;
        $candidate->party_id=$request->party_id;
        $candidate->adhaar_no=$request->adhaar_no;
        $candidate->contact_no=$request->contact_no;
        $candidate->gender=$request->gender;
        $candidate->address=$request->address;
        $candidate->state_id=$request->state_id;
        $candidate->district_id=$request->district_id;
        if($request->file('image'))
        {
            $filename = $this->uploadImage($request->file('image'));

            $candidate->image = $filename;
        }

        $candidate->save();

        return redirect()->route('candidate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // abort_if(!Auth::Candidate()->hasPermission('read-Candidates'), 403);
        $candidate=Candidate::find($id);
        
        return view('candidate.show')->withCandidate($candidate);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // abort_if(!Auth::Candidate()->hasPermission('update-Candidates'), 403);
        $candidate=Candidate::find($id);
        $parties=Party::all();
        $states=State::all();
        $districts=District::all();
        return view('candidate.edit')->withCandidate($candidate)->withStates($states)->withDistricts($districts)->withParties($parties);
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
       // abort_if(!Auth::Candidate()->hasPermission('create-Candidates'), 403);
      

       $candidate= Candidate::find($id);
        $candidate->name=$request->name;
        $candidate->email=$request->email;
        $candidate->adhaar_no=$request->adhaar_no;
        $candidate->contact_no=$request->contact_no;
        $candidate->gender=$request->gender;
        $candidate->address=$request->address;
        $candidate->state_id=$request->state_id;
        $candidate->district_id=$request->district_id;
        if($request->file('image'))
        {
            $filename = $this->uploadImage($request->file('image'));

            $candidate->image = $filename;
        }

        $candidate->save();

        return redirect()->route('candidate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $candidate=Candidate::find($id);
        $candidate->delete();
        if($candidate->image)
        {
            $this->deleteImage($candidate->image);
        }
        return redirect('candidate');
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
        abort_if(!Auth::Candidate()->hasPermission('delete-blogs'), 403);
        $filename = public_path() . '/' . $image;

        unlink($filename);

    }

}
