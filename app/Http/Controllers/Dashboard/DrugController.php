<?php

namespace App\Http\Controllers\Dashboard;

use App\Drug;
use App\DataTables\DrugDatatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DrugController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_drugs'])->only('index');
        $this->middleware(['permission:create_drugs'])->only('create');
        $this->middleware(['permission:update_drugs'])->only('edit');
        $this->middleware(['permission:delete_drugs'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DrugDatatables $drug)
    {
        return $drug->render('dashboard.drugs.index',['title' => 'drugsControl']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.drugs.create',['title' => 'create_drug']);

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
            'drug_name'        => 'required|string',
            'drug_use'        => 'required|string',

        ],[],[
            'drug_name'    => trans('site.drug_name'),
            'drug_use'    => trans('site.drug_use'),

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

        }
        $drug               = new Drug;
        $drug->drug_name    = $request->drug_name;
        $drug->drug_use     = $request->drug_use;

        $drug->save();



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
        $drug = Drug::find($id);
        $title = 'edit_drug';
        return view('dashboard.drugs.edit',compact('title','drug'));
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
            'drug_name'        => 'required|string',
            'drug_use'        => 'required|string',

        ],[],[
            'drug_name'    => trans('site.drug_name'),
            'drug_use'    => trans('site.drug_use'),

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

        }

        $drug = Drug::find($id);
        $drug->update([
            'drug_name'    => $request->drug_name,
            'drug_use'     => $request->drug_use
        ]);

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
        $drug = Drug::find($id)->delete();

        if($drug) {
            return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
        } else{
            return response()->json(['status'  => 0,'message' => trans('site.error')]);
        }
    }

    public function destroyAll(Request $request)
    {
        if(is_array(Request('item'))){
            $drugs = Drug::destroy(Request('item'));
            return response()->json([
                'status'  => 1,
                'message' => trans('site.doneDelete')
                ]);
        }
    }
}
