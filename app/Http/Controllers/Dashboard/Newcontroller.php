<?php

namespace App\Http\Controllers\Dashboard;

use App\News;
use App\includes\Helpers;
use App\DataTables\NewDatatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Newcontroller extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_news'])->only('index');
        $this->middleware(['permission:create_news'])->only('create');
        $this->middleware(['permission:update_news'])->only('edit');
        $this->middleware(['permission:delete_news'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewDatatables $new)
    {
        return $new->render('dashboard.news.index',['title' => 'newsControl']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.news.create',['title' => 'create_news']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'img'               => 'nullable|image|mimes:png,jpg,jpeg',
            'ar.title'       => array(
                            'required',
                            'string',

                        ),
            'en.title'       => array(
                                'required',
                                'string',
                                ),
            'ar.description'       => array(
                                'required',
                                'string',
                                ),
            'en.description'       => array(
                            'required',
                            'string',
                            ),
        ],[],[
            'img'               => trans('site.img'),
            'ar.title'          => trans('site.ar_title'),
            'en.title'          => trans('site.en_title'),
            'ar.description'    => trans('site.ar_description'),
            'en.description'    => trans('site.en_description'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

        }
        $new = new News;
        $new->fill($request->all());
        if($request->hasFile('img')){
            $new->img = Helpers::upload($request->img,'news');
        }
        $new->status    = $request->status;
        $new->on_slider = $request->on_slider;
        $new->save();

        return response()->json([
            'status'  => 1,
            'message' => trans('site.doneAdd'),
        ]);
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
        $new = News::find($id);

        return view('dashboard.news.edit',['title' => 'edit_news', 'new' => $new]);

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
        $validator = Validator::make($request->all(),[
            'img'            => 'nullable|image|mimes:png,jpg,jpeg',
            'ar.title'       => array(
                            'required',
                            'string',

                        ),
            'en.title'       => array(
                                'required',
                                'string',
                            ),
            'ar.description'       => array(
                                'required',
                                'string',
                                ),
            'en.description'       => array(
                            'required',
                            'string',
                            ),
        ],[],[
            'img'               => trans('site.img'),
            'ar.title'          => trans('site.ar_title'),
            'en.title'          => trans('site.en_title'),
            'ar.description'    => trans('site.ar_description'),
            'en.description'    => trans('site.en_description'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

        }
        $new = News::find($id);
        $past_img = $new->img;
        $new->fill($request->all());
        if($request->hasFile('img')){
            $past_img != 'news/new.jpg' ? Storage::delete($past_img) : '';
            $new->img = Helpers::upload($request->img,'news');
        }else{
            $new->img = $past_img;
        }
        $new->save();
        return response()->json([
            'status'  => 1,
            'message' => trans('site.doneAdd'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $past_img = $new->img;
        if($new){
            $past_img != 'news/new.jpg' ? Storage::delete($past_img) : '';
            $new->delete();
            return response()->json([
                'status'  => 1,
                'message' => trans('site.doneDelete')
                ]);
        }else {
            return response()->json([
                'status'  => 0,
                'message' => 'wornig'
                ]);
        }
    }

    public function destroyAll(Request $request)
    {
        if(is_array(Request('item'))){
            News::destroy(Request('item'));
            return response()->json([
                'status'  => 1,
                'message' => trans('site.doneDelete')
                ]);
        }else {
            return response()->json([
                'status'  => 0,
                'message' => "wornig"
                ]);
        }
    }
}
