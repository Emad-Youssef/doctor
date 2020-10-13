<?php

namespace App\Http\Controllers;

use App\Pocket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PocketController extends Controller
{
    public function store(Request $request)
    {

      $start = \Carbon\Carbon::now();
      $start->format('Y-m-d');
      $two_weeks_from_now = $start->addWeeks(2);

      $validator = Validator::make($request->all(),[
          'f_name'        => 'required|string|max:10',
          'l_name'        => 'required|string|max:10',
          'country'       => 'required|string',
          'city'          => 'required|string',
          'sex'           => 'required|string',
          'phone'         => 'required|string|max:11',
          'age'           => 'required|string',
          'current_date'  => 'required|before:'.$two_weeks_from_now,
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
              'message'   => trans('site.donePocket')
          ]);

      }else {
          return response()->json([
              'status'    => 3,
              'message'   => trans('site.pocketIsFull')
          ]);
      }


    }

}
