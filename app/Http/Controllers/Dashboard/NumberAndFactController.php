<?php

namespace App\Http\Controllers\Dashboard;

use App\Fact;
use App\DataTables\FactDatatablesles;
use Illuminate\Support\Facades\Storage;
use App\includes\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NumberAndFactController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_facts'])->only('index');
        $this->middleware(['permission:create_facts'])->only('create');
        $this->middleware(['permission:update_facts'])->only('edit');
        $this->middleware(['permission:delete_facts'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FactDatatablesles $fact)
    {
        return $fact->render('dashboard.facts.index',['title' => 'factsControl']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.facts.create',['title' => 'create_facts']);
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
            'img'           => 'required|image|mimes:png',
            'ar.title'      => 'required|string|min:2',
            'en.title'      => array(
                                'required',
                                'string',
                                'regex:/(^([a-zA-Z ]+$))/u'
                            ),
            'number'        => 'required|integer',
        ],[],[
            'ar.title'      => trans('site.ar_title'),
            'en.title'      => trans('site.en_title'),
            'number'        => trans('site.number'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);
        }
        $fact = new Fact();
        $fact->fill($request->all());
        if($request->hasFile('img')){
            $fact->img = Helpers::upload($request->img,'facts');
        }
        $fact->save();

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
        $fact = Fact::find($id);
        return view('dashboard.facts.edit', ['title' => 'edit_fact' , 'fact' => $fact]);
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
            'img'           => 'nullable|image|mimes:png',
            'ar.title'      => 'required|string|min:2',
            'en.title'      => array(
                                'required',
                                'string',
                                'regex:/(^([a-zA-Z ]+$))/u'
                            ),
            'number'        => 'required|integer',
        ],[],[
            'ar.title'      => trans('site.ar_title'),
            'en.title'      => trans('site.en_title'),
            'number'        => trans('site.number'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);
        }
        $fact = Fact::find($id);
        $fact_img = $fact->img;
        $fact->fill($request->all());
        if($request->hasFile('img')){
            $fact_img != null ? Storage::delete($fact_img) : '';
            $fact->img = Helpers::upload($request->img,'facts');
        }
        $fact->save();

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
        $fact = Fact::find($id);
        $fact_img = $fact->img;
        $fact_img != null?Storage::delete($fact_img):'';
        $fact->delete();

        if($fact) {
            return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
        } else{
            return response()->json(['status'  => 0,'message' => trans('site.error')]);
        }
    }
}
