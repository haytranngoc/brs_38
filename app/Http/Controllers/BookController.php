<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use App\Models\Suggest;
use Session;
use App\Traits\UploadImagesTrait;
use App\Http\Requests\BookRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use UploadImagesTrait;

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $categories = Category::pluck('name', 'id');

        return view('user.books.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        try {
            $user = auth()->user()->id;
            $data = $request->only([
                'category_id', 
                'title', 
                'publish_date', 
                'author', 
                'number_pages'
            ]);
            $data += $this->uploadimages($request);
            $book = Book::create($data);
            $book->owners()->attach($user);
            Session::flash('success', trans('messages.createsucces'));

            return redirect()->route('users.show', $user);
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.errorfail'));
            
            return back();
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
        try {
            $user = auth()->user();
            $book = Book::with(['bookReviews.user', 'owners'])->findOrFail($id);
            if($user) {
                $checkOwner = $user->owners()->get()->pluck('id')->toArray();
                $checkSuggest = $user->suggests()->get()->pluck('id')->toArray();
            }

            return view('user.books.show', compact('book', 'checkOwner', 'checkSuggest'));
        } catch (Exception $e) {
            Session::flash('success', trans('messages.not_found'));

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
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            Session::flash('success', trans('messages.deletesuccess'));
            
            return redirect()->route('books.index');
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.errordelete'));

            return back();
        }
    }

    public function review(ReviewRequest $request, $id)
    {
        try {
            $user = auth()->user();
            $data = $request->only(['content']);
            $data['user_id'] = $user->id;
            $data['book_id'] = $id;
            $review = Review::create($data);
            Session::flash('success', trans('messages.createsucces'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.errorfail'));
        }

        return back();
    }

    public function suggest(Request $request, $id)
    {
        try {
            $user = auth()->user();
            $data = $request->only(['status']);
            $data['user_id'] = $user->id;
            $data['book_id'] = $id;
            $suggest = Suggest::create($data);
            Session::flash('success', trans('messages.createsucces'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.errorfail'));
        }

        return back();
    }
}
