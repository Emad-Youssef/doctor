<?php

namespace App\Http\Controllers\Dashboard;

use App\Salary;
use App\Employee;
use App\DataTables\SalaryDatatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
{
  public function __construct()
  {
      //create read update delete
      $this->middleware(['permission:read_salarys'])->only('index');
      $this->middleware(['permission:create_salarys'])->only('create');
      $this->middleware(['permission:update_salarys'])->only('edit');
      $this->middleware(['permission:delete_salarys'])->only('destroy');

  }//end of constructor
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(SalaryDatatables $salary)
  {
    return $salary->render('dashboard.salarys.index',['title' => 'salaryControl']);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $salary = Salary::find($id);
    $title = 'edit_salary';
    return view('dashboard.salarys.edit',compact('title','salary'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $validator = Validator::make($request->all(),[
        'salary'          => 'required|integer',
    ],[],[
        'salary'      => trans('site.salary'),
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'  => 0,
            'message' => $validator->errors()
        ]);

    }
    $salary = Salary::find($id);
    $salary->update(['salary' => $request->salary]);

    return response()->json([
        'status'  => 1,
        'message' => trans('site.updeted_done')
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

  }

}

?>
