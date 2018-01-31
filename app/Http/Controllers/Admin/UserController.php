<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Session;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(config('setting.paginate'));

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        try {
            $user = User::findOrFail($id);
            
            return view('admin.users.edit', compact('user'));
        } catch (Exception $e) {
            Session::flash('success', trans('messages.not_found'));

            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $data = $request->only(['name', 'email']);
            $user->password = $request->has('password') ? $request->input('password') : $request->input('password');
            $user->update($data);
            Session::flash('success', trans('messages.editsuccess'));

            return redirect()->route('admin.users.index');
        } catch (Exception $e) {
            Session::flash('success', trans('messages.erroredit'));

            return back();
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
        try {
            $user = User::findOrFail($id);
            $user->delete();
            Session::flash('success', trans('messages.deletesuccess'));
            
            return redirect()->route('admin.users.index');
        } catch (Exception $e) {
            Session::flash('success', trans('messages.errordelete'));

            return back();
        }
    }
}
