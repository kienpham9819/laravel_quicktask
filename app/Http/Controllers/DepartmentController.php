<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::all();

        return view('department.list', compact(['data']));
    }
    
    public function create()
    {
        return view('department.add');
    }

    public function store(DepartmentRequest $request)
    {
        Department::create($request->all());

        return redirect()->route("departments.index")->with('message', trans('title.noti_add'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {

            $data = Department::findOrFail($id);

            return view('department.edit', compact(['data']));

        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function update(DepartmentRequest $request, $id)
    {
        $data = $request->all();

        Department::updateOrCreate(['id'=>$id], $data);

        return redirect()->route("departments.index")->with('message', trans('title.noti_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $parent = Department::findOrFail($id);
            foreach ($parent->staffs as $staff) {
                $staff->delete();
            }

            $parent->delete();
                
            return redirect()->route("departments.index")->with('message', trans('title.noti_delete'));
        
        } catch (ModelNotFoundException $e) {
             echo $e->getMessage();
        }
        
    }
}
