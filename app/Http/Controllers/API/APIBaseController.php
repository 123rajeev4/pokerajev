<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class APIBaseController extends Controller
{

    public function sendResponse($result, $message,$requestkey)
    {
    	$response = [
            'status' => 'SUCCESS',
            'message' => $message,
            'requestKey'=>$requestkey,
            'data'    => $result,  
        ];

        return response()->json($response, 200);
    }


    public function sendError($requestkey,$errorMessages)
    {
    	$response = [
            'status' => 'FAILURE',
            'message' => $errorMessages,
            'requestKey'=>$requestkey,
        ];

    return response()->json($response, 200);

    }


    public function android_push($deviceToken = null, $message = null, $type = null,$badge = null,$batch = array())
    {

     //dd($batch);

        $this->autoRender = false;
        $this->layout     = false;
        $url              = 'https://android.googleapis.com/gcm/send';
        $message          = array("batch"=>$batch,'badge'=>$badge,'sound' => 'default','type'=>$type,"message" => $message);
        $registatoin_ids  = array($deviceToken);
        $fields           = array('registration_ids' => $registatoin_ids, 'data' => $message);

        $GOOGLE_API_KEY   = "AIzaSyBmVXIVhBq6ukA17eq5ZKoNwJGlGu5UQEQ";
        $headers          = array(
            'Authorization: key=' . $GOOGLE_API_KEY,
            'Content-Type: application/json',
        );
         

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === false) {
           // die('Curl failed: ' . curl_error($ch));
        } else {
           // print_r("success");die;
        }

        curl_close($ch);


    }


}
