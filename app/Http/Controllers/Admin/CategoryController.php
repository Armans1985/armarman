<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.category-list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-add');
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
        $new_category = new Category();
        $new_category->fill($inputs);
        if ($new_category->save()) {
            return redirect('/admin-group-1/category')->with('status', 'Category Sucssesfuly added!!!');
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
        $edit = Category::find($id);

        return view('admin.category-edit', compact('edit'));
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
        $update = Category::find($id);
        $update->fill($input);
        if ($update->update()) {
            return redirect('admin-group-1/category')->with('Category Successfully update!!!');
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
        $destroy = Category::find($id);
        if ($destroy->delete()) {
            return redirect('/admin-group-1/category')->with('status', 'Category Sucssesfuly Removed!!!');
        }

    }
    public function category_trash()
    {
        $all_trashed_category = Category::onlyTrashed()->get();
        return view('admin.category-trash-list', compact('all_trashed_category'));
    }


    public function category_restore($id)
    {
        $trashed_category = Category::withTrashed()->findOrFail($id)->restore();
        if ($trashed_category) {
            return redirect()->back()->with('status', 'Successfully restored from trash !!!');
        }
    }
    public function category_remove($id)
    {
        $finel_delete_category = Category::withTrashed()->where('id', $id)->get();
        if ($finel_delete_category[0]->forceDelete()) {
            return redirect()->back()->with('status', 'Successfully deleted from trash !!!');
        }
    }
}
