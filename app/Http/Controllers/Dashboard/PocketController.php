<?php

namespace App\Http\Controllers\Dashboard;

use App\Pocket;
use App\DataTables\PocketDatatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PocketController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_pockets'])->only('index');
        $this->middleware(['permission:create_pockets'])->only('create');
        $this->middleware(['permission:update_pockets'])->only('edit');
        $this->middleware(['permission:delete_pockets'])->only('destroy');

    }//end of constructor

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(PocketDatatables $pocket)
  {
      return $pocket->render('dashboard.pockets.index',['title' => 'pocketControl']);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('dashboard.pockets.create',['title' => 'pocketControl']);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    $start = \Carbon\Carbon::now();
    $start->format('Y-m-d');
    $two_weeks_from_now = $start->addWeeks(2);

    $after = date('d.m.Y',strtotime("-1 days"));

    $validator = Validator::make($request->all(),[
        'f_name'        => 'required|string|max:15',
        'l_name'        => 'required|string|max:15',
        'country'       => 'required|string',
        'city'          => 'required|string',
        'sex'           => 'required|string',
        'phone'         => 'required|min:11|numeric',
        'age'           => 'required|string',
        'current_date'  => 'required|before:'.$two_weeks_from_now.'|after:'.$after,
        // 'current_date'  => 'required|after:2019-11-6'
        ],[],[
            'f_name'    => trans('site.f_name'),
            'l_name'    => trans('site.l_name'),
            'country'   => trans('site.country'),
            'city'      => trans('site.city'),
            'sex'       => trans('site.sex'),
            'phone'     => trans('site.phone'),
            'age'       => trans('site.age'),
            'current_date'   => trans('site.date')
        ]);

    if($validator->fails()) {
        return response()->json([
            'status'    => 0,
            'message'   => $validator->errors()
        ]);
    }

    $date = \Carbon\Carbon::parse($request->current_date);
    $count = Pocket::where('m', $date->month)->where('d', $date->day)->count();
    $pocket_limits = DB::table('pocket_limits')->latest('id')->first();



    if($count < $pocket_limits->limit) {

        $pocket = new Pocket;
        $pocket->f_name     = $request->f_name;
        $pocket->l_name     = $request->l_name;
        $pocket->country    = $request->country;
        $pocket->city       = $request->city;
        $pocket->sex        = $request->sex;
        $pocket->phone      = $request->phone;
        $pocket->age        = $request->age;
        $pocket->y          = date('Y');
        $pocket->m          = $date->month;
        $pocket->d          = $date->day;
        $pocket->save();
        return response()->json([
            'status'    => 1,
            'message'   => trans('site.doneAdd')
        ]);

    }else {
        return response()->json([
            'status'    => 3,
            'message'   => trans('site.pocketIsFull')
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
  public function edit($id)
  {
    $pocket = Pocket::find($id);
    return view('dashboard.pockets.edit',['title' => 'edit_pocket','pocket' => $pocket]);


  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $start = \Carbon\Carbon::now();
    $start->format('Y-m-d');
    $two_weeks_from_now = $start->addWeeks(2);
    $after = date('d.m.Y',strtotime("-1 days"));
    // dd($request->all());
    $validator = Validator::make($request->all(),[
        'f_name'        => 'required|string|max:15',
        'l_name'        => 'required|string|max:15',
        'country'       => 'required|string',
        'city'          => 'required|string',
        'sex'           => 'required|string',
        'phone'         => 'required|string|min:11|numeric',
        'age'           => 'required|string',
        'current_date'  => 'required|before:'.$two_weeks_from_now.'|after:'.$after,
        // 'current_date'  => 'required|after:2019-11-6'
        ],[],[
            'f_name'    => trans('site.f_name'),
            'l_name'    => trans('site.l_name'),
            'country'   => trans('site.country'),
            'city'      => trans('site.city'),
            'sex'       => trans('site.sex'),
            'phone'     => trans('site.phone'),
            'age'       => trans('site.age'),
            'current_date'   => trans('site.date')
        ]);

    if($validator->fails()) {
        return response()->json([
            'status'    => 0,
            'message'   => $validator->errors()
        ]);
    }

    $date   = \Carbon\Carbon::parse($request->current_date);
    $count  = Pocket::where('m', $date->month)->where('d', $date->day)->count();
    $pocket_limits = DB::table('pocket_limits')->latest('id')->first();
    // dd($date->day);
    if($count < $pocket_limits->limit) {

        $pocket = Pocket::find($id);
        $pocket->update([
            'f_name'        => $request->f_name,
            'l_name'        => $request->l_name,
            'country'       => $request->country,
            'city'          => $request->city,
            'sex'           => $request->sex,
            'phone'         => $request->phone,
            'age'           => $request->age,
            'y'             => date('Y'),
            'm'             => $date->month,
            'd'             => $date->day,
            'patient'       => $request->patient,
            'confirm'       => $request->confirm
        ]);


        return response()->json([
            'status'    => 1,
            'message'   => trans('site.updeted_done')
        ]);

    }else {
        return response()->json([
            'status'    => 3,
            'message'   => trans('site.pocketIsFull')
        ]);
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $pocket = Pocket::find($id)->delete();

      if($pocket) {
          return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
      } else{
          return response()->json(['status'  => 0,'message' => trans('site.error')]);
      }
  }

  public function destroyAll(Request $request)
  {
      if(is_array(Request('item'))){
          $pockets = Pocket::destroy(Request('item'));
          return response()->json([
              'status'  => 1,
              'message' => trans('site.doneDelete')
              ]);
      }
  }

  public function updateConfirm(Request $request)
  {

    DB::table('pockets')
            ->where('id', $request->id)
            ->update(['confirm' => 'yes']);

    return response()->json([
        'status'  => 1,
        'message' => trans('site.donepokets')
        ]);

  }



}

?>
