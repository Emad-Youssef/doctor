<?php

namespace App\Http\Controllers\Dashboard;

use App\Patient;
use App\DataTables\PatientDatatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_patients'])->only('index');
        $this->middleware(['permission:create_patients'])->only('create');
        $this->middleware(['permission:update_patients'])->only('edit');
        $this->middleware(['permission:delete_patients'])->only('destroy');

    }//end of constructor
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(PatientDatatables $patient)
    {
        return $patient->render('dashboard.patients.index',['title' => 'patientControl']);
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    if($request->patient ){
        $patient                = new Patient;
        $patient->pocket_id     = $request->id;
        $patient->patient_name  = $request->name;
        $patient->address       = $request->address;
        $patient->age           = $request->age;
        $patient->save();
        if($patient){
            DB::table('pockets')
            ->where('id', $request->id)
            ->update(['patient' => 'yes']);
        }

        return response()->json([
            'status'  => 1,
            'message' => trans('site.doneAdd'),
        ]);

    } else{
        $validator = Validator::make($request->all(),[
            'pocket_id'       => 'required|integer',
        ],[],[
            'pocket_id'   => trans('site.pocket')
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()->all()
            ]);

        }

        $patient                = new Patient;
        $patient->pocket_id     = $request->id;
        $patient->patient_name  = $request->name;
        $patient->address       = $request->address;
        $patient->age           = $request->age;
        $patient->save();

        return response()->json([
            'status'  => 1,
            'message' => trans('site.doneAdd'),
        ]);
    }



  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $patient = Patient::find($id)->delete();

    if($patient) {
        return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
    } else{
        return response()->json(['status'  => 0,'message' => trans('site.error')]);
    }
  }

}

?>
