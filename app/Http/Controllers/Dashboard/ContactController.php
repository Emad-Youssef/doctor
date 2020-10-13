<?php
namespace App\Http\Controllers\Dashboard;

use App\Contact;
use App\DataTables\MailDatatablesles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(MailDatatablesles $mail)
  {
    return $mail->render('dashboard.messages.index',['title' => 'mailboxControl']);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('dashboard.messages.create',['title' => 'send']);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(),[
        'name'        => 'required|string',
        'email'       => 'required|email',
        'subject'     => 'required|string',
        'message'     => 'required|string',
        ],[],[
            'name'    => trans('site.name'),
            'subject'    => trans('site.subject'),
            'email'   => trans('site.email'),
            'message'      => trans('site.message')
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 0,
                'message'   => $validator->errors()
            ]);
        }
        $mail = new Contact;
        $mail->name       = $request->name;
        $mail->email      = $request->email;
        $mail->subject    = $request->subject;
        $mail->message    = $request->message;

        $mail->save();
        return response()->json([
            'status'    => 1,
            'message'   => trans('site.sendSucsses')
        ]);


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Request $request,$id)
  {
        $message = Contact::find($id);
        $message->update(['readable' => 1]);

        return view ('dashboard.messages.read', ['title' => 'read_mail', 'message' => $message]);
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
      $contact = Contact::find($id)->delete();

      if($contact) {
          return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
      } else{
          return response()->json(['status'  => 0,'message' => trans('site.error')]);
      }
  }

  public function destroyAll(Request $request)
  {
      if(is_array(Request('item'))){
          $contacts = Contact::destroy(Request('item'));
          return response()->json([
              'status'  => 1,
              'message' => trans('site.doneDelete')
              ]);
      }
  }

}

?>
