<?php

namespace App\Http\Controllers\Dashboard;


use App\Service;
use App\includes\Helpers;
use App\DataTables\ServiceDatatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_services'])->only('index');
        $this->middleware(['permission:create_services'])->only('create');
        $this->middleware(['permission:update_services'])->only('edit');
        $this->middleware(['permission:delete_services'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDatatables $service)
    {
        return $service->render('dashboard.services.index',['title' => 'servicesControl']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create',['title' => 'create_services']);

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
            'img'               => 'required|image|mimes:png',
            'ar.title'       => array(
                                'required',
                                'string',

                            ),
            'en.title'       => array(
                                    'required',
                                    'string',
                                    'regex:/(^([a-zA-Z .,]+$))/u'
                                ),
            'ar.description'       => array(
                                    'required',
                                    'string',
                                    ),
            'en.description'       => array(
                                'required',
                                'string',
                                'regex:/(^([a-zA-Z .,]+$))/u'
                                ),
        ],[],[
            'ar.title'          => trans('site.ar_title'),
            'en.title'          => trans('site.en_title'),
            'ar.description'  => trans('site.ar_description'),
            'en.description'  => trans('site.en_description'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);
        }
        $service = new Service;
        $service->fill($request->all());
        if($request->hasFile('img')){
            $service->img = Helpers::upload($request->img,'service');
        }
        $service->save();
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
        $service = Service::find($id);
        return view('dashboard.services.edit',['title' => 'edit_service','service' => $service]);

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
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'img'           => 'nullable|image|mimes:png',
            'ar.title'       => array(
                                'required',
                                'string',

                            ),
            'en.title'       => array(
                                    'required',
                                    'string',
                                    'regex:/(^([a-zA-Z .,]+$))/u'
                                ),
            'ar.description'       => array(
                                    'required',
                                    'string',
                                    ),
            'en.description'       => array(
                                'required',
                                'string',
                                'regex:/(^([a-zA-Z .,]+$))/u'
                                ),
        ],[],[
            'ar.title'          => trans('site.ar_title'),
            'en.title'          => trans('site.en_title'),
            'ar.description'  => trans('site.ar_description'),
            'en.description'  => trans('site.en_description'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);
        }

        $service = Service::find($id);
        $service_img = $service->img;
        $service->fill($request->all());
        if($request->hasFile('img')){
            $service_img != null ? Storage::delete($service_img) : '';
            $service->img = Helpers::upload($request->img,'service');
        }
        $service->save();

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
        $service =  Service::find($id);
        $service_img = $service->img;
        $service_img != null?Storage::delete($service_img):'';
        $service->delete();

        if($service) {
            return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
        } else{
            return response()->json(['status'  => 0,'message' => trans('site.error')]);
        }
    }
}
