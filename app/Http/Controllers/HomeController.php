<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function blog()
    {
        return view('blog-page');
    }

    public function sendMessage(Request $request)
    {
        //dd($request->all());
        $response = array();
        $response['message'] = "";

        $validateData = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required'
//            'weight' => 'required',
//            'selectFrom' => 'required',
//            'selectTo' => 'required',
//            'type_of_train' => 'required',
//            'title' => 'required',
        ]);

        $errors = $validateData->errors();

        if (!(count($errors->all()) > 0 )) {
            $ip = $request->getClientIp();
            $data=array(
                'name' => $request->name,
                'body' => $request->phone,
                'selectFrom'=>$request->selectFrom,
                'selectTo'=>$request->selectTo,
                'type_of_train'=>$request->type_of_train,
                'weight'=>$request->weight,
                'title'=>$request->title,
                'ip' => $ip
            );
            try {

                $to_name = 'Nursultan Serikbay';
                $to_email = 'nursultaniitu@gmail.com';

                Mail::send('mail.sendmessage', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('Заявка на обратный звонок с cte-aktau.kz');
                    $message->from('cteaktaukz220@gmail.com','Manager of cte-aktau.kz');
                });

                if (!Mail::failures()) {
                    $response['message'] = "success";
                } else {
                    $response['message'] = "failed";
                }
            } catch (Exception $e) {
                $response['message'] = $e->getMessage();
            }
        } else {

            foreach ($errors->all() as $e) {
                $response['message'] .= $e . ', ';
            }
            $response['message'] .= "All Input Cannot Be Empty!";
        }


        echo json_encode($response);

    }
}
