<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Memo;
use Session;
use Illuminate\Support\Facades\View;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $memos = Memo::orderby('id', 'desc')->get();
        $cnt = Memo::all()->count();

        return view('memos.index')->withMemos($memos)->withCnt($cnt);
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
        $this->validate($request, array('memo' => 'required'));
        $memo = new Memo;
        $memo->memo = $request->memo;
        $memo->save();

        Session::flash('success', 'New Memo was successfully created!');

        return redirect()->route('memos.index');
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
        // get the memo
        $memo = Memo::find($id);

        // show the edit form and pass the memo
        return View::make('memos.edit')
            ->with('memo', $memo);
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
        $memo = Memo::find($id);

        $this->validate($request, ['memo' => 'required']);

        $memo->memo = $request->memo;
        $memo->save();

        Session::flash('success', 'Successfully saved your new Memo!');

        return redirect()->route('memos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();


        Session::flash('success', 'The memo was successfully deleted.');
        return redirect()->route('memos.index');

    }

}
