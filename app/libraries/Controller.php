<?php

/*
 * Base controller
 * this loads models and views
 * */

class Controller {

    // Load model
    public function model($model){
        //Require model
        require_once '../app/models/'.$model.'.php';

        //Instanciate model
        return new $model();
    }

    public function view($view, $data=[]){
        extract($data);
        if(file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/partials/header.php';
            require_once '../app/views/'.$view.'.php';
            require_once '../app/views/partials/footer.php';

        }else{
            die('View does not exist');
        }
    }

}