<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DirectoryController
 *
 * @author patrick
 */
class DirectoryController extends Controller {

    private $directoryServer = "directory.binghamton.edu/";
    private $searchScript = "directory/dir_output.results";
    private $profileScript = "directory/dir_output.profile";
    private $params = array(
            "output" => "json",
            "cols" => "ABDFLMCKIPQ",
            "vkey" => "bMobi"
        );
        
    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionListRecords($q=''){
        if (strlen($q)){
            $results = $this->searchDirectory($q);
            $obj=json_decode($results,true);

        } else {
            // error
        }

        $this->render('listRecords',array('q'=>$q,'results'=>$results,'obj'=>$obj));
    }
    
    public function actionPersonProfile($id=''){
        if (strlen($id)){
            $results = $this->loadProfile($id);
            $obj=json_decode($results,true);

        } else {
            // error
        }

        $this->render('personProfile',array('id'=>$id,'results'=>$results,'obj'=>$obj));
    }

    private function loadProfile($id) {
        if (strlen($id)){
            // append search term to params
            $this->params["id"]=$id;

            // create directory URL to call
            $callURL = "http://"
                    .$this->directoryServer
                    .$this->profileScript
                    ."?".  http_build_query($this->params);
            
            // call the URL
            $response = file_get_contents($callURL);

            return $response; 
        }    
    }
    
    private function searchDirectory($searchterm) {
        if (strlen($searchterm)){
            // append search term to params
            $this->params["search"]=$searchterm;

            // create directory URL to call
            $callURL = "http://"
                    .$this->directoryServer
                    .$this->searchScript
                    ."?".  http_build_query($this->params);
            
            // call the URL
            $response = file_get_contents($callURL);

            return $response; 
        } 
        
    }

}
