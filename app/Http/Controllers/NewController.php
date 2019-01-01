<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = \App\News::all();
        return Response()->json($news,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'body'      => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('news.create'))
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $news = new \App\News;
            $news->title       = $request->title;
            $news->body      = $request->body;
            $news->save();

            // redirect
            \Session::flash('message', 'Successfully created news!');
            return view('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
  /*  public function show($id)
    {
        $news = \App\News::find($id)
        return $news;
    
    }*/

    public function show($id)
    {
      return view('show',compact('id'));
    }

  public function showNews($id){
    $news = \App\News::find($id);
    return Response()->json($news,200);
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(!$id){
          \Session::flash('message', 'Error');
        }
        $destroy = \App\News::find($id);
        if($destroy){
          $destroy->delete();
        }
        return view('home');
    }
}
