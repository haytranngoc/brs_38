<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Suggest;
use Auth;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = Auth::user()->with('owners')->findOrFail($id);
            
            return view('user.users.show', compact('user'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.not_found'));

            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function suggests($id)
    {
        try {
            $user = auth()->user();
            $books = DB::table('books')
                ->join('suggests', 'books.id', '=', 'suggests.book_id')
                ->join('owners', 'books.id', '=', 'owners.book_id')
                ->where('suggests.status', config('setting.zero'))
                ->where('owners.user_id', $user->id)
                ->select('suggests.id as suggest_id', 'suggests.status', 'books.*')
                ->get();
            $confirms = Suggest::with('book', 'user')
                ->where('suggests.status', config('setting.one'))
                ->where('suggests.owner_id', $user->id)
                ->get();
            
            return view('user.users.suggest', compact('user', 'books', 'confirms'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.not_found'));

            return back();
        }
    }

    public function borrowed($id)
    {
        try {
            $user = auth()->user();
            $giveBacks = Suggest::with('book', 'user')
                ->where('suggests.status', config('setting.two'))
                ->where('suggests.user_id', $user->id)
                ->get();
            
            return view('user.users.borrowed', compact('user', 'giveBacks'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.not_found'));

            return back();
        }
    }
}
