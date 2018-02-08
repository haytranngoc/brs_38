<?php

namespace App\Http\Controllers;

use App\Models\Suggest;
use Session;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function update(Request $request, $id)
    {
        try {
            $suggest = Suggest::findOrFail($id);
            $user = auth()->user();
            $data = $request->all();
            $data['user_id'] = $suggest->user_id;
            $data['book_id'] = $suggest->book_id;
            $data['owner_id'] = $user->id;
            $data['status'] = config('setting.one');
            $suggest->update($data);
            Session::flash('success', trans('messages.lendingsuccess'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.not_found'));
        }
        
        return back();
    }
}
