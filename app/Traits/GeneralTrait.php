<?php

namespace App\Traits;

trait GeneralTrait
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "", $errNum = "S000")
    {
        return response()->json([
            'status' => true,
            'errNum' => 200,
            'msg' => $msg
        ]);
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'errNum' => 200,
            'msg' => $msg,
            $key => $value
        ]);
    }

    public function send($device_token,$title,$message)
    {
        return $this->sendNotification($device_token, array(
          "title" => $title,
          "body" => $message,
        ));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification($device_token, $message)
    {
        $SERVER_API_KEY = '<YOUR-SERVER-API-KEY>';

        // payload data, it will vary according to requirement
        $data = [
            "to" => $device_token, // for single device id
            "data" => $message
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        curl_close($ch);

        return $this->returnData('firbase',$response,"done");
    }
}
