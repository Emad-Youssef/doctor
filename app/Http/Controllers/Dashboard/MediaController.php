<?php

namespace App\Http\Controllers\Dashboard;


use App\Media;
use App\includes\Helpers;
use App\DataTables\MediaDatatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_media'])->only('index');
        $this->middleware(['permission:create_media'])->only('create');
        $this->middleware(['permission:update_media'])->only('edit');
        $this->middleware(['permission:delete_media'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MediaDatatables $media)
    {
        return $media->render('dashboard.media.index',['title' => 'mediaControl']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.media.create',['title' => 'create_media']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'img'   => 'required|image|mimes:png,jpg,jpeg',
        ],[],[
            'img'   => trans('site.img'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);
        }
        $media = new Media();
        $media->status = $request->status;
        if($request->hasFile('img')){
            $media->img = Helpers::upload($request->img,'media');
        }
        $media->save();

        return response()->json([
            'status'  => 1,
            'message' => trans('site.doneAdd')
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
        $media = Media::find($id);
        $title = 'edit_media';
        return view('dashboard.media.edit',compact('title','media'));
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
        $validator = Validator::make($request->all(), [
            'img'   => 'nullable|image|mimes:png,jpg,jpeg',
        ],[],[
            'img'   => trans('site.img'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);
        }
        $media = Media::find($id);
        $media_img = $media->img;
        $media->status = $request->status;
        if($request->hasFile('img')){
            $media_img != null ? Storage::delete($media_img) : '';
            $media->img = Helpers::upload($request->img,'media');
        }
        $media->save();

        return response()->json([
            'status'  => 1,
            'message' => trans('site.updeted_done')
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
        $media = Media::find($id);
        $media_img = $media->img;
        $media_img != null?Storage::delete($media_img):'';
        $media->delete();
        if($media) {
            return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
        } else{
            return response()->json(['status'  => 0,'message' => trans('site.error')]);
        }
    }
}
