<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Http\Requests\StaffRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StaffController extends Controller
{
    public function index()
    {
        $data = Staff::orderBy('updated_at', 'DESC')->paginate(config('pagination.page'));

        return view('staff.list', compact(['data']));
    }

    public function create()
    {
        $deps = Department::all();

        return view('staff.add', compact(['deps']));
    }

    public function store(StaffRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename= time() . "_" . $file->getClientOriginalName();
            $file->storeAs(config('linkimage.destination'), $filename);
            $data['avatar'] = config('linkimage.sourceurl') . $filename;
        }

        Staff::create($data);

        return redirect()->route("staffs.index")->with('message', trans('title.noti_add'));
    }

    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        try {
            $data = Staff::findOrFail($id);
            $dep = Department::all();

            return view('staff.edit', compact(['data', 'dep']));
        } catch (ModelNotFoundException $e) {
            return redirect()->route("staffs.index")->with('message', trans('title.noti_not_found'));
        }

    }

    public function update(StaffRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename= time() . "_" . $file->getClientOriginalName();
            $file->storeAs(config('linkimage.destination'), $filename);
            $data['avatar'] = config('linkimage.sourceurl') . $filename;
        }
        Staff::updateOrCreate(['id' => $id], $data);

        return redirect()->route("staffs.index")->with('message', trans('title.noti_edit'));
    }

    public function destroy($id)
    {
        try {
            $staff = Staff::findOrFail($id);
            $staff->delete();

            return redirect()->route("staffs.index")->with('message', trans('title.noti_delete'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route("staffs.index")->with('message', trans('title.noti_not_found'));
        }
    }
}
