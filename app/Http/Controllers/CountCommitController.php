<?php

namespace App\Http\Controllers;

use App\Models\CountCommit;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use PhpParser\Node\Stmt\TryCatch;

class CountCommitController extends Controller
{ 

//Without Token / Key
    public function apiWithoutKey(Request $request)
    {

    //Create Client with Guzzle        
        $client = new Client();
        $client_author = new Client();

    //Variables for User
        $username = $request->input('username');
        $repo_name = $request->input('repo_name');        
        $repo_fullname = "$username/$repo_name";
        $url = "https://api.github.com/repos/$username/$repo_name/commits";
        $url_author = "https://api.github.com/repos/$username/$repo_name";                      

    //Get the Repo
        $per_page = 50;                        
        $page = 0;
        $responseBody = array();
        do
        {
            $page++;        
            try {
                
                $response = $client->request('GET', $url ,[            
                'verify' => false,                             
                'query' => [
                    'per_page' => "$per_page",
                    'page' => "$page"
                ],                
                ]);

            $responseTemp = json_decode($response->getBody());                     
            $responseBody[] = $responseTemp;               
                
            } catch (\Exception $e){
                $message = $e->getMessage();                 
                $findme = "resulted in a";    
                $pos = strpos($message,$findme);
                $error_message = substr($message,$pos);
                $error_message_2 = substr($message,0,7);
                $array_of_error = array("400","401","403","404","419","422","429","500","503");
                $i = 0;                

                foreach($array_of_error as $error)
                {
                    if (strpos($error_message, $array_of_error[$i]) !== false)
                    {
                        $error_page = $array_of_error[$i];
                        return view('myerrors.'.$error_page.'', compact('username','repo_name'));                     
                    }
                    $i++;
                } 
                
                if ($error_message_2 == "Maximum")
                {
                    return view('myerrors.limit_access');
                }

                return view('myerrors.other_error');
            }        

        }
        while(count($responseTemp) == $per_page);
        
        //author profile
        $response_author = $client_author->request('GET', $url_author ,[            
            'verify' => false,
        ]);
        $responseBody_author = json_decode($response_author->getBody());

    //Get total Commit
        $total_commit = 0;        
        foreach($responseBody as $hmm){
            $total_commit += count($hmm); 
        }

    //Return to the view
        return view('pages.apiwithoutkey', compact('responseBody','responseBody_author','total_commit','repo_name'));
    }    

//With Token / Key
    public function apiWithKey(Request $request)
    {
    //Create Client with Guzzle
        $client = new Client();
        $client_author = new Client();
        
    //Variables for User
        $username = $request->input('username');
        $repo_name = $request->input('repo_name');        
        $token = $request->input('token');
        $repo_fullname = "$username/$repo_name";
        $url = "https://api.github.com/repos/$username/$repo_name/commits";
        $url_author = "https://api.github.com/repos/$username/$repo_name";
        $headers = array("Authorization" => "Token {$token}");        

    //Get the Repo
        $per_page = 50;        
        $responseBody = array();
        $page = 0;
        do
        {
            $page++;        
            try {
                $response = $client->request('GET', $url ,[            
                'verify' => false,   
                'headers' => $headers,             
                'query' => [
                    'per_page' => "$per_page",
                    'page' => "$page"
                    ]
                ]);

            $responseTemp = json_decode($response->getBody());                     
            $responseBody[] = $responseTemp;               
                
            } catch (\Exception $e){
                $message = $e->getMessage();                 
                $findme = "resulted in a";    
                $pos = strpos($message,$findme);
                $error_message = substr($message,$pos);
                $error_message_2 = substr($message,0,7);
                $array_of_error = array("400","401","403","404","419","422","500","503");
                $i = 0;                

                foreach($array_of_error as $error)
                {
                    if (strpos($error_message, $array_of_error[$i]) !== false)
                    {
                        $error_page = $array_of_error[$i];
                        return view('myerrors.'.$error_page.'', compact('username','repo_name'));                     
                    }
                    $i++;
                } 
                
                if ($error_message_2 == "Maximum")
                {
                    return view('myerrors.limit_access');
                }

                return view('myerrors.other_error');
            }        


        }
        while(count($responseTemp) == $per_page); 
        
        //author profile
        $response_author = $client_author->request('GET', $url_author ,[            
            'verify' => false,
            'headers' => $headers,
        ]);
        $responseBody_author = json_decode($response_author->getBody());

    //Get total Commit
        $total_commit = 0;        
        foreach($responseBody as $hmm){
            $total_commit += count($hmm); 
        }

    //Return to the view
        return view('pages.apiwithkey', compact('responseBody','responseBody_author','total_commit','repo_name'));
    }

//With Many of Repos
    public function apiMain(Request $request)
    {
    //Create Client with Guzzle
        $client = new Client();
        
    //Variables for User

        $username = $request->input('username');
        $token = $request->input('token');
        $repos_name = $request->input('repos_name'); 
        $start_date_ctrl = $request->input('start_date');
        $end_date_ctrl = $request->input('end_date');
        
        $array_repos_name = array();
        $array_response = array();
        $array_total_commit = array();

        //Get word with separate by space or enter
        $tok = strtok($repos_name, " \n");
        while ($tok !== false) {            
            array_push($array_repos_name,$tok);
            $tok = strtok(" \n");
        }

        for($i = 0 ; $i < count($array_repos_name)-1; $i++)
        {
            $array_repos_name[$i] = substr($array_repos_name[$i],0,-1);
        }

        $headers = array("Authorization" => "Token {$token}");

        foreach($array_repos_name as $repo_name)
        {            
            $url = "https://api.github.com/repos/$username/$repo_name/commits";                    

            //Get the Repo
            $per_page = 50;        
            $responseBody = array();
            $page = 0;
            do
            {
                $page++;
                try {
                    $response = $client->request('GET', $url ,[            
                    'verify' => false,   
                    'headers' => $headers,             
                    'query' => [
                        'per_page' => "$per_page",
                        'page' => "$page"
                        ],                    
                    ]);

                $responseTemp = json_decode($response->getBody());                     
                $responseBody[] = $responseTemp;
                    
                } catch (\Exception $e){
                    $message = $e->getMessage();                    
                    $findme = "resulted in a";  
                    $pos = strpos($message,$findme);
                    $error_message = substr($message,$pos);
                    $error_message_2 = substr($message,0,7);
                    $array_of_error = array("400","401","403","404","419","422","500","503");
                    $i = 0;                

                    foreach($array_of_error as $error)
                    {
                        if (strpos($error_message, $array_of_error[$i]) !== false)
                        {
                            $error_page = $array_of_error[$i];
                            return view('myerrors.'.$error_page.'', compact('username','repo_name'));
                        }
                        $i++;
                    }             

                    return view('myerrors.other_error', compact('username','repo_name'));
                }
            }
            while(count($responseTemp) == $per_page);        

            //Get total Commit
            $total_commit = 0;             
            $array_date = array();
            foreach($responseBody as $response_nth){
                $total_commit += count($response_nth);                             
            }

            array_push($array_response, $responseBody);            
            array_push($array_total_commit, $total_commit);
        }            

    //Return to the view
        return view('pages.apimain', compact('array_response','array_total_commit','array_repos_name','start_date_ctrl','end_date_ctrl'));
    }

    public function getWithoutKey(Request $input)
    {
        return view('pages.getwithoutkey');
    }

    public function getWithKey(Request $input)
    {
        return view('pages.getwithkey');
    }

    public function getMain(Request $input)
    {
        return view('pages.getmain');
    }

    public function tes(Request $request)
    {
        $repos_name = $request->input('repos_name');
        $array_repos_name = array();

        $tok = strtok($repos_name, " \n");
        while ($tok !== false) {            
            array_push($array_repos_name, $tok);
            $tok = strtok(" \n");
        }

        for($i = 0 ; $i < count($array_repos_name)-1; $i++)
        {
            $array_repos_name[$i] = substr($array_repos_name[$i],0,-1);
        }

        return view('pages.testes', compact('array_repos_name'));
    }

    public function getTes(Request $input)
    {
        return view('pages.tes');
    }    
}
