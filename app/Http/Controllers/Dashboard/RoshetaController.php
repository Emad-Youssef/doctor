<?php

namespace App\Http\Controllers\Dashboard;

use App\Rosheta;
use App\Patient;
use App\DataTables\RoshetaDatatables;
use App\DataTables\ShowDrugDatatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RoshetaController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_roshetas'])->only('index');
        $this->middleware(['permission:create_roshetas'])->only('create');
        $this->middleware(['permission:update_roshetas'])->only('edit');
        $this->middleware(['permission:delete_roshetas'])->only('destroy');

    }//end of constructor

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(RoshetaDatatables $rosheta)
  {
      return $rosheta->render('dashboard.rosheta.index',['title' => 'roshetaControl']);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(ShowDrugDatatables $drug)
  {
    $patients = Patient::all();
    return $drug->render('dashboard.rosheta.create',['title' => 'roshetaControl','patients' => $patients]);


  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    // dd($request->all());
    $validator = Validator::make($request->all(),[
    'patient_id'        => 'required',
    'diagnosis'         => 'required|string',
    'drug_id'           => 'required',
    'doctor_name'       => 'required|string',
    ],[],[
        'patient_id'    => trans('site.patient'),
        'diagnosis'     => trans('site.diagnosis'),
        'drug_id'       => trans('site.drug_name'),
        'doctor_name'   => trans('site.doctor_name'),


    ]);

    if($validator->fails()) {
        return response()->json([
            'status'    => 0,
            'message'   => $validator->errors()
        ]);
    }

    $rosheta = new Rosheta;
    $rosheta->patient_id     = $request->patient_id;
    $rosheta->diagnosis      = $request->diagnosis;
    $rosheta->doctor_name    = $request->doctor_name;
    $rosheta->save();

    if($rosheta){
        foreach($request->drug_id as $drug){
            $rosheta->drugs()->attach($drug);
        }
    }


    return response()->json([
        'status'    => 1,
        'message'   => trans('site.doneAdd')
    ]);


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $rosheta = Rosheta::find($id);

    $roshetaDrugs = $rosheta->drugs;
    return view('dashboard.rosheta.print',['title' => 'rosheta','rosheta' => $rosheta, 'roshetaDrugs' => $roshetaDrugs]);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(ShowDrugDatatables $drug, $id)
  {
    $rosheta = Rosheta::find($id);
    $roshDrug = $rosheta->drugs;
    $patients = Patient::all();
    return $drug->render('dashboard.rosheta.edit',['title' => 'edit_rosheta','rosheta' => $rosheta, 'patients' => $patients,'roshDrug' => $roshDrug]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    // dd($request->all());
    $validator = Validator::make($request->all(),[
        'patient_id'        => 'required',
        'diagnosis'         => 'required|string',
        'drug_id'           => 'nullable',
        'doctor_name'       => 'required|string',
        ],[],[
            'patient_id'    => trans('site.patient'),
            'diagnosis'     => trans('site.diagnosis'),
            'drug_id'       => trans('site.drug_name'),
            'doctor_name'   => trans('site.doctor_name'),


        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 0,
                'message'   => $validator->errors()
            ]);
        }

        $rosheta = Rosheta::find($id);
        $rosheta->patient_id     = $request->patient_id;
        $rosheta->diagnosis      = $request->diagnosis;
        $rosheta->doctor_name    = $request->doctor_name;
        $rosheta->save();

        if($rosheta){
            if($request->has('drug_id')){
                $rosheta->drugs()->detach();
                foreach($request->drug_id as $drug){
                    $rosheta->drugs()->attach($drug);
                }

            }

        }


        return response()->json([
            'status'    => 1,
            'message'   => trans('site.doneAdd')
        ]);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $rosheta = Rosheta::find($id)->delete();

      if($rosheta) {
          return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
      } else{
          return response()->json(['status'  => 0,'message' => trans('site.error')]);
      }
  }

  public function destroyAll(Request $request)
  {
      if(is_array(Request('item'))){
          $rosheta = Rosheta::destroy(Request('item'));
          return response()->json([
              'status'  => 1,
              'message' => trans('site.doneDelete')
              ]);
      }
  }

}

?>
