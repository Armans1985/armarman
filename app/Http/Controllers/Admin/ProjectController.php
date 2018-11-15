<?php

namespace App\Http\Controllers\Admin;

use App\Proffesion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Category;
use Validator;
use Illuminate\Support\Facades\File;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(5);
        return view('admin.project-list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.project-add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required',
            'poster' => 'required',
            'category_id' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $inputs = $request->except('_token');
        $images_paths = [];
        if ($request->hasFile('poster')) {
            foreach ($request->file('poster') as $file) {
                $new_name = uniqid(mb_strimwidth($request->title, 0, 3, '_')) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $new_name);
                array_push($images_paths, $new_name);
            }
        }

        $inputs['poster'] = $images_paths;

        $new_project = new Project();
        $new_project->fill($inputs);
        if ($new_project->save()) {
            return redirect('/admin-group-1/project')->with('status', 'Project Sucssesfuly added!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Project::find($id);
        $categories = Category::all();
        return view('admin.project-edit', ['edit' => $edit, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required',
            'poster' => 'required',
            'category_id' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $inputs = $request->except('_token', '_method');

        $images_paths = [];

        if ($request->hasFile('new_poster')) {
            foreach ($request->file('new_poster') as $file) {
                $new_name = uniqid(mb_strimwidth($request->title, 0, 3, '_')) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $new_name);
                array_push($images_paths, $new_name);
            }
            $inputs['poster'] = $images_paths;
            unset($inputs['new_poster']);
        }


        $update = Project::find($id);
        $update->fill($inputs);
        if ($update->update()) {
            return redirect('admin-group-1/project')->with('Project Successfully update!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Project::find($id);
//        $images = $destroy->poster;
//        foreach ($images as $image) {
//            $delete_image = public_path('images/') . $image;
//            File::delete($delete_image);
//
//        }

        if ($destroy->delete()) {
            return redirect('/admin-group-1/project')->with('status', 'Project Sucssesfuly Removed!!!');
        }
    }

    public function project_trash()
    {
        $all_trashed_project = Project::onlyTrashed()->get();
        return view('admin.project-trash-list', compact('all_trashed_project'));
    }


    public function project_restore($id)
    {
        $trashed_project = Project::withTrashed()->findOrFail($id)->restore();
        if ($trashed_project) {
            return redirect()->back()->with('status', 'Successfully restored from trash !!!');
        }
    }

    public function project_remove($id)
    {
        $finel_delete_project = Project::withTrashed()->where('id', $id)->get();
        if ($finel_delete_project[0]->forceDelete()) {
            foreach ($finel_delete_project[0]->poster as $image) {

                $delete_project = public_path("images" . '/' . $image);
                // dd($delete_project);

                File::delete($delete_project);

            }

            return redirect()->back()->with('status', 'Successfully deleted from trash !!!');
        }
    }
}
