<?php

namespace App\Http\Controllers\Dashboard;

use App\Employee;
use App\Salary;
use App\Work;
use Illuminate\Support\Facades\DB;
use App\DataTables\EmployeeDatatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_employees'])->only('index');
        $this->middleware(['permission:create_employees'])->only('create');
        $this->middleware(['permission:update_employees'])->only('edit');
        $this->middleware(['permission:delete_employees'])->only('destroy');

    }//end of constructor
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(EmployeeDatatables $employee)
  {
    return $employee->render('dashboard.employees.index',['title' => 'employeesControl']);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $works = Work::all();
    return view('dashboard.employees.create',['title' => 'create_employee','works' => $works]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(),[
        'f_name'        => 'required|string',
        'l_name'        => 'required|string',
        'ssn'           => 'required|unique:employees|min:14|numeric',
        'phone'         => 'required|unique:employees|min:11|numeric',
        'level'         => 'required|in:doctor,recepion,nursing,cleanliness',
        'salary'        => 'required',
        'work_id'       => 'required',
        'from'          => 'required',
        'to'            => 'required',
    ],[],[
        'f_name'    => trans('site.f_name'),
        'l_name'    => trans('site.l_name'),
        'ssn'       => trans('site.ssn'),
        'level'     => trans('site.work_type'),
        'salary'    => trans('site.salary'),
        'work_id'   => trans('site.work_days'),
        'from'      => trans('site.from'),
        'to'        => trans('site.to'),
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'  => 0,
            'message' => $validator->errors()
        ]);

    }
    $employee           = new Employee;
    $employee->f_name   = $request->f_name;
    $employee->l_name   = $request->l_name;
    $employee->phone    = $request->phone;
    $employee->level    = $request->level;
    $employee->ssn      = $request->ssn;
    $employee->save();

    if($employee){
        $salary                 = new Salary;
        $salary->employee_id    = $employee->id;
        $salary->salary         = $request->salary;
        $salary->save();

        foreach($request->work_id as $work){
            $employee->works()->attach([$work=>[
                'from'  => $request->from,
                'to' => $request->to,
            ]
            ]);
        }


    }else{
        $employee->delete();
    }

    return response()->json([
        'status'  => 1,
        'message' => trans('site.doneAdd'),
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

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Employee $employee)
  {
    $workArray = $employee->works;
    // $workArray = $workArr->pluck('id')->toArray();
    $works = Work::all();

    // $employee = $teeeeee->pluck('works')->collapse();
    return view('dashboard.employees.edit',['title' => 'edit_employee', 'employee' => $employee,'works' => $works,'workArray' => $workArray]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $validTime = 'nullable';
    if($request->work_id !== null){
        $validTime = 'required';
    }
    $validator = Validator::make($request->all(),[
        'f_name'        => 'required|string',
        'l_name'        => 'required|string',
        'ssn'           => 'required|min:14|numeric|unique:employees,ssn,'.$id,
        'phone'         => 'required|min:11|numeric|unique:employees,phone,'.$id,
        'level'         => 'required|in:doctor,recepion,nursing,cleanliness',
        'salary'        => 'required',
        'work_id'       => 'nullable',
        'from'          => $validTime,
        'to'            => $validTime
    ],[],[
        'f_name'     => trans('site.f_name'),
        'l_name'     => trans('site.l_name'),
        'ssn'        => trans('site.ssn'),
        'level'      => trans('site.work_type'),
        'salary'     => trans('site.salary'),
        'work_id'    => trans('site.work_days'),
        'from'       => trans('site.from'),
        'to'         => trans('site.to'),

    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'  => 0,
            'message' => $validator->errors()
        ]);

    }
    $employee = Employee::find($id);
    $employee->f_name   = $request->f_name;
    $employee->l_name   = $request->l_name;
    $employee->phone    = $request->phone;
    $employee->level    = $request->level;
    $employee->ssn      = $request->ssn;

    $employee->save();
    if($employee){
        $salary = Salary::where('employee_id',$employee->id);
        $salary->update(['salary' => $request->salary]);

        if($request->has('work_id')){
            $employee->works()->detach();
            foreach($request->work_id as $work){
                $employee->works()->attach([$work=>[
                    'from'  => $request->from,
                    'to' => $request->to,
                ]
                ]);
            }
        }

    }

    return response()->json([
        'status'  => 1,
        'message' => trans('site.updeted_done'),
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
      $employee = Employee::find($id)->delete();

      if($employee) {
          return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
      } else{
          return response()->json(['status'  => 0,'message' => trans('site.error')]);
      }
  }

  public function destroyAll(Request $request)
  {
      if(is_array(Request('item'))){
          Employee::destroy(Request('item'));
          return response()->json([
              'status'  => 1,
              'message' => trans('site.doneDelete')
              ]);
      }
  }

}

?>
