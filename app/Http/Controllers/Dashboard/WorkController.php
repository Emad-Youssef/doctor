<?php

namespace App\Http\Controllers\Dashboard;

use App\Work;
use App\DataTables\WorkDatatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_works'])->only('index');
        $this->middleware(['permission:create_works'])->only('create');
        $this->middleware(['permission:update_works'])->only('edit');
        $this->middleware(['permission:delete_works'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WorkDatatables $work)
    {
        return $work->render('dashboard.workTimes.index',['title' => 'workTimesControl']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.workTimes.create',['title' => 'create_work']);

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
            'ar.day'       => array(
                                'required',
                                'string',
                                'max:10',
                            ),
            'en.day'       => array(
                                    'required',
                                    'string',
                                    'max:10',
                                    'regex:/(^([a-z]+$))/u'
                                ),
        ],[],[
            'ar.day'    => trans('site.ar_day'),
            'en.day'    => trans('site.en_day'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

        }
        $work = Work::create($request->all());

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
        $workTime = Work::find($id);
        return view('dashboard.workTimes.edit',['title' => 'edit_work','workTime' => $workTime]);

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
            'ar.day'       => array(
                                'required',
                                'string',
                                'max:10',
                            ),
            'en.day'       => array(
                                    'required',
                                    'string',
                                    'max:10',
                                    'regex:/(^([a-z]+$))/u'
                                ),

        ],[],[
            'ar.day'    => trans('site.ar_day'),
            'en.day'    => trans('site.en_day'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

        }
        $work =  Work::find($id);
        $work->update($request->all());
        return response()->json([
            'status'  => 1,
            'message' => trans('site.updeted_done'),
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
        $work =  Work::find($id)->delete();

        if($work) {
            return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
        } else{
            return response()->json(['status'  => 0,'message' => trans('site.error')]);
        }
    }
}
