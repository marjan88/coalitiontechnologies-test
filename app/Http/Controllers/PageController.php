<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;

class PageController extends Controller {

    public function index() {
        $file = storage_path() . '/file.json';
        $contents = null;
        if (file_exists($file)) {
            $contents = \File::get($file);
        }

        if (Request::ajax()) {

            $data = [
                'id' => substr(time(), -3, 4),
                'product' => \Input::get('product'),
                'qnt' => \Input::get('qnt'),
                'price' => number_format(\Input::get('price'), 2),
                'date' => date('m-d-Y H:i:s')
            ];


            if (file_exists($file)) {
                $content = \File::get($file);
                $tempArray = json_decode($content, TRUE);
                array_filter($tempArray);
               
                array_push($tempArray, $data);
                $jsonData = json_encode($tempArray);
                \File::put(storage_path() . '/file.json', $jsonData);
            } else {
                $arrayData = array();
                array_push($arrayData, $data);
                \File::put(storage_path() . '/file.json', json_encode($arrayData));
            }
            $dataFromFile = \File::get($file);

            return \Response::make($dataFromFile, 200)->header('Content-Type', 'application/json');
        }

        return view('pages.index', compact('contents'));
    }

    public function showXml() {
        $file = storage_path() . '/file.json';
        if (file_exists($file)) {
            $contents = \File::get($file);
            return \Response::make($contents, 200)->header('Content-Type', 'application/json');
        }
    }

    public function delete($id) {
        $file = storage_path() . '/file.json';
        if (file_exists($file)) {
            $contents = \File::get($file);
            $contents = json_decode($contents, TRUE);

            foreach ($contents as $content) {
                
                if (in_array($id, $content)) {  
                   
                    unset($content['id']);   
                    unset($content['product']); 
                    unset($content['price']); 
                    unset($content['date']); 
                    unset($content['qnt']);                    
                }    
           
            }
            \File::put(storage_path() . '/file.json', json_encode($contents));
            

            return redirect('/');
        }
    }

}
