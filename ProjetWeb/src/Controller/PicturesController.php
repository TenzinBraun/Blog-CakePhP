<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/11/2018
 * Time: 09:39
 */

namespace App\Controller;


/**
 * @property bool|object Picture
 */
class PicturesController extends AppController
{

    public function load(){
        $file= file_get_contents(WWW_ROOT."json/photos.json");
        $values = json_decode($file);
        foreach($values as $key => $value){
            $pictures = $this->Pictures->newEntity();
            $pictures->file = $value->file;
            $pictures->description =  $value->description;
            $pictures->comment_picture = $value->comment;
            $pictures->author_picture = $value->author;
            $pictures->width = $value->width;
            $pictures->height = $value->height;
            $pictures->html = $value->html;
            $this->Pictures->save($pictures);
        }
        return $this->response->withStringBody("");
    }

    public function read(){
        $pictures = $this->Pictures->find()->select(['file']);
        $option = $this->request->getQuery();
        foreach($option as $key => $query){
            debug($option);
            if($key == "limit"){
                $pictures = $this->Pictures->find()->toArray();
                $pictures = array_slice($pictures,0,$this->request->getQuery("limit"));
            }
            if($key == "id"){
                $pictures = $this->Pictures->find()
                ->select()
                ->where(['id' => $this->request->getQuery($key)]);
            }
            if($key == "file"){
                $pictures = $this->Pictures->find()
                    ->select()
                    ->where(['file' => $this->request->getQuery($key)]);
            }
            if($key == "author"){
                $pictures = $this->Pictures->find()
                    ->select()
                        ->where(['author' => $this->request->getQuery($key)]);
            }
        }
        $this->set(compact('pictures'));
    }

    public function index(){


        $pictures = $this->Pictures
            ->find()
            ->all();
        $this->set(compact('pictures'));

    }

}