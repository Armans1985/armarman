<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(5);
        return view('admin.service-list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service-add');
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
            'description' => 'required|max:255',
            'text' => 'required',
            'icone' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $inputs = $request->except('_token');
        $new_service = new Service();
        $new_service->fill($inputs);
        if ($new_service->save()) {
            return redirect('/admin-group-1/service')->with('status', 'Service Sucssesfuly added!!!');
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
        $edit = Service::find($id);

        return view('admin.service-edit', compact('edit'));
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
            'description' => 'required|max:255',
            'text' => 'required',
            'icone' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->except('_token', '_method');
        $update = Service::find($id);
        $update->fill($input);
        if ($update->update()) {
            return redirect('admin-group-1/service')->with('Service Successfully update!!!');
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
        $distroy = Service::find($id);
        //dd($distroy);
        $distroy->delete();
        return redirect('admin-group-1/service');

    }
    public function service_trash()
    {
        $all_trashed_services = Service::onlyTrashed()->get();
        return view('admin.service-trash-list', compact('all_trashed_services'));
    }


    public function service_restore($id)
    {
        $trashed_services = Service::withTrashed()->findOrFail($id)->restore();
        if ($trashed_services) {
            return redirect()->back()->with('status', 'Successfully restored from trash !!!');
        }
    }
    public function service_remove($id)
    {
        $finel_delete_service = Service::withTrashed()->where('id', $id)->get();
        if ($finel_delete_service[0]->forceDelete()) {
            return redirect()->back()->with('status', 'Successfully deleted from trash !!!');
        }
    }

}
