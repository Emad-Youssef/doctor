<?php
namespace App\Http\Controllers\Dashboard;

use App\PocketLimit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PocketLimitController extends Controller
{


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $pocketlimit = PocketLimit::find($id);
    return view('dashboard.pocketlimit',['title' => 'pocketlimit', 'pocketlimit' => $pocketlimit]);

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
        'limit'      => 'required|integer',
    ],[],[

        'limit'    => trans('site.count')
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'  => 0,
            'message' => $validator->errors()->all()
        ]);

    }
    $pocketlimit =  PocketLimit::find($id);
    $pocketlimit->limit = $request->limit;
    $pocketlimit->save();

    return response()->json([
        'status'  => 1,
        'message' => trans('site.updeted_done'),
    ]);


  }


}

?>
