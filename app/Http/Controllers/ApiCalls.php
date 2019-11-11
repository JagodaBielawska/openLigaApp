<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class ApiCalls
{
    public function callSoapClient()
    {
        $client = new SoapClient("https://www.openligadb.de/Webservices/Sportsdata.asmx?wsdl");
        
        try 
        {
            $data['match'] =  $client->GetNextMatch(array('leagueShortcut' => 'bl1'));
        }
        catch(Exception $e) 
        {
        die($e->getMessage());
        }

        return view('welcome')->with('data',$data);
    }
    
}