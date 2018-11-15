<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Proffesion;
use Illuminate\Support\Facades\File;
use Validator;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Proffesion::orderBy('id', 'DESC')->paginate(5);
        return view('admin.profession-list', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profession-add');
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
            'name' => 'required|max:255'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $inputs = $request->except('_token');
        $new_category = new Proffesion();
        $new_category->fill($inputs);
        if ($new_category->save()) {
            return redirect('/admin-group-1/profession')->with('status', 'Profession Sucssesfuly added!!!');
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
        $edit = Proffesion::find($id);

        return view('admin.profession-edit', compact('edit'));
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->except('_token', '_method');
        $update = Proffesion::find($id);
        $update->fill($input);
        if ($update->update()) {
            return redirect('admin-group-1/profession')->with('Profession Successfully update!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Proffesion::find($id);
        if ($destroy->delete()) {
            return redirect('/admin-group-1/profession')->with('status', 'Profession Sucssesfuly Removed!!!');
        }
    }
    public function profession_trash()
    {
        $all_trashed_profession = Proffesion::onlyTrashed()->get();
        return view('admin.profession-trash-list', compact('all_trashed_profession'));
    }


    public function profession_restore($id)
    {
        $trashed_profession = Proffesion::withTrashed()->findOrFail($id)->restore();
        if ($trashed_profession) {
            return redirect()->back()->with('status', 'Successfully restored from trash !!!');
        }
    }
    public function profession_remove($id)
    {
        $finel_delete_profession = Proffesion::withTrashed()->where('id', $id)->get();
        if ($finel_delete_profession[0]->forceDelete()) {
            return redirect()->back()->with('status', 'Successfully deleted from trash !!!');
        }
    }
}
