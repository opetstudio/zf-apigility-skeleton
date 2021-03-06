<?php
namespace dashboard\V1\Rpc\Csvtojson;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;

class CsvtojsonController extends AbstractActionController
{
    public function csvtojsonAction()
    {
        // // $header = array(
        // //     'Year',
        // //     'Make',
        // //     'Model',
        // //     'Description',
        // //     'Price',
        // // );
        // // $records = array(
        // //     array(
        // //         '1997',
        // //         'Ford',
        // //         'E350',
        // //         'ac, abs, moon',
        // //         '3000.00',
        // //     ),
        // // );
        // // $this->CsvExport('./foo.csv', $header, $records);
        // $file="/Users/rayakurayasem/workspace_php/apigility/test.csv";
        // $csv= file_get_contents($file);
        
        // $array = array_map(function($d){
        //     return $d;
        // }, explode("\n", $csv));
        // $allRows = [];
        // for ($x = 0; $x < count($array); $x++) {
        //     if($x == 0) $head = explode(",",$array[0]);
        //     if($x > 0){
        //         $body = explode(",", $array[$x]);
        //         array_push($allRows,json_encode(array($head[0] => $body[0])));
        //     }
        // }
        // // print_r($allRows);
        // // foreach($array as $v) {
        // //     echo $v;
        // //     echo "\n";
        // // }
        // // $json = json_encode($array);
        // // print_r($json);
        // return new ViewModel(["data" => $allRows]);
        // if user isn't authenticated return nothing


        if(!$this->getIdentity() instanceof AuthenticatedIdentity) {
            return [];
        }

        // this array returyour query here using $userIdns the authentication info
        // in this case we need the 'user_id' 
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();

        // note, by default user_id is the email (username column in oauth_users table)
        $userId = $identityArray['user_id'];

        // fetch all using $userId
        // return new ViewModel(["ack" => $userId]);
        return $identityArray;
    }
}
