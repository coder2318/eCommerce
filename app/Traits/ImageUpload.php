<?php

namespace App\Traits;

trait ImageUpload {
    public function imageUpload($params, $model=null)
    {
        if($params['image']){
            if($model){
                unlink('assets/images/products/'.$model->image);
            }
            $image_name = time().'.'.$params['image']->extension();
            $params['image']->move('assets/images/products/', $image_name);
            $params['image'] = $image_name;
        }

        if($params['images']){
            $images = [];
            if($model and $model->images){
                $old_images = explode(',', $model->images);
                foreach($old_images as $old_image){
                    unlink('assets/images/products/'.$old_image);
                }
            }
            foreach($params['images'] as $key=>$item){
                $image_name = time().'_'.$key.'.'.$item->extension();
                $item->move('assets/images/products/', $image_name);
                $images[] = $image_name;
            }
            $params['images'] = implode(',', $images);
        }

        return $params;
    }

    public function deleteFile($model)
    {
        if($model->image){
            unlink('assets/images/products/'.$model->image);
        }

        if($model->images){
            $old_images = explode(',', $model->images);
            foreach($old_images as $old_image){
                unlink('assets/images/products/'.$old_image);
            }
        }

        return true;
    }
}
