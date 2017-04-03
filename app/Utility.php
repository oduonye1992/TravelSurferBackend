<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 02/04/2017
 * Time: 10:10 PM
 */

namespace App;


use Berkayk\OneSignal\OneSignalClient;

class Utility
{
    public static function push($message, $userID){
        $client = new OneSignalClient('2e098240-5844-4ac2-baff-22d3ce23f4a5', 'Y2VjYTk2YjctOGQ0ZS00MmYwLThmYWMtYWY3ZmY3OGFhNTY5', 'YjQ1MTY4ODYtYWRhYy00ZGMzLThiNGYtNTU2ZmEwNzdhOTU0');
        $client->sendNotificationToAll($message, $url = null, $data = null, $buttons = null, $schedule = null);
    }
    public static function notify($message){
        $client = new OneSignalClient('2e098240-5844-4ac2-baff-22d3ce23f4a5', 'Y2VjYTk2YjctOGQ0ZS00MmYwLThmYWMtYWY3ZmY3OGFhNTY5', 'YjQ1MTY4ODYtYWRhYy00ZGMzLThiNGYtNTU2ZmEwNzdhOTU0');
        $client->sendNotificationToAll($message, $url = null, $data = null, $buttons = null, $schedule = null);
    }
}