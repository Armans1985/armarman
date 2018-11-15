<?php

namespace App\Http\Controllers\Admin;
use App\Member;
use App\Proffesion;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$name = Proffesion::find(1)->member;
        //$name = Member::find(2)->proffesion;
        //dd($name);
        $members = Member::orderBy('id', 'DESC')->paginate(5);
        return view('admin.member-list', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profession = Proffesion::all();
        return view('admin.member-add', compact('profession'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'path' => '',
            'name' => 'required|max:255',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'gplus_link' => 'required',
            'inkedin_link' => 'required',
            'profession_id' => '',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $img = $request->file('path');
        //dd($img);
        $new_name = uniqid(mb_strimwidth($request->name, 0, 3, '_')) . '.' . $img->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        //$images = $img->getClientOriginalName();
        $img->move($destinationPath, $new_name);

        $input = $request->except('_token');
        $new_team = new Member();
        $new_team->fill($input);
        $new_team->path = $new_name;

        if ($new_team->save()) {
            return redirect('/admin-group-1/member')->with('status', 'Member Sucssesfuly added!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profession = Proffesion::all();
        $edit = Member::find($id);
//        dd($edit->path);
        return view('admin.member-edit', ['edit' => $edit, 'profession' => $profession]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $images=Member::find($id);
        $input = $request->except('_token', '_method');
        $validate = Validator::make($request->all(), [
            'path' => '',
            'name' => 'required|max:255',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'gplus_link' => 'required',
            'inkedin_link' => 'required',
            'profession_id' => '',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
//       if($request->hasfile('new_path')){
////            dd($request->new_path);
//
//            $img = $images->path;
//            $path =public_path().'/images/'.$img;
//            File::delete($path);
//
//       }

       if($request->hasfile('new_path')) {
           $image = $request->file('new_path');
           //dd($image);
           $new_name = $image->getClientOriginalName();
           //dd($new_name);
           $path = public_path('/images/');

           $image->move($path, $new_name);

           $input['path'] = $new_name;

           $img = $images->path;
           $path =public_path().'/images/'.$img;
           File::delete($path);

       }

           $member = Member::find($id);
           $member->fill($input);
           $member->update();
           return redirect('/admin-group-1/member');





//
//        $img = $request->file('path');
//       //dd($img);
//        $new_name = uniqid(mb_strimwidth($request->name, 0, 3, '_')) . '.' . $img->getClientOriginalExtension();
//        //dd($new_name);
//        $destinationPath = public_path('/images');
//        $img->move($destinationPath, $new_name);
//
//        $inputs = $request->except('_token', '_method');
//
//        $update = Member::find($id);
//        $update->fill($inputs);
//
//        if ($update->update()) {
//            return redirect('admin-group-1/member')->with('Member Successfully update!!!');
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Member::find($id);
        if ($destroy->delete()) {
            return redirect('/admin-group-1/member')->with('status', 'Member Sucssesfuly Removed!!!');
        }
    }
    public function member_trash()
    {
        $all_trashed_members = Member::onlyTrashed()->get();
        return view('admin.member-trash-list', compact('all_trashed_members'));
    }


    public function member_restore($id)
    {
        $trashed_members = Member::withTrashed()->findOrFail($id)->restore();
        if ($trashed_members) {
            return redirect()->back()->with('status', 'Successfully restored from trash !!!');
        }
    }
    public function member_remove($id)
    {
        $finel_delete_members = Member::withTrashed()->where('id', $id)->get();
        //dd($finel_delete_members);
        if ($finel_delete_members[0]->forceDelete()) {

                File::delete(public_path("images/" . $finel_delete_members[0]->path));

            }

            return redirect()->back()->with('status', 'Successfully deleted from trash !!!');



    }
}
