<?php

class Mymodule_Videogallery_Model_Observer {

    public function saveVideos($event) {
        $product = $event->getProduct();
        $videoPostData = $product->getData("videos");
        foreach ($videoPostData as $video){
            $video_data= Mage::getModel("videogallery/videos");
            //This is for inserting new videos
            if(!empty($video["videoUrl"]) && $video["is_delete"]==0 && !isset($video['video_id'])){
                $video_data->setData("video_product_id",$product->getId());
                $video_data->setData("video_url",$video["videoUrl"]);
                $video_data->save();
            }
            // This is for deleting existing videos
            else if($video["is_delete"]==1 && isset($video['video_id'])){
                $video_data->load($video['video_id']);
                $video_data->delete();
            }
            // This is for updating existing videos
            if(isset($video['video_id']) && $video["is_delete"]==0){
                $video_data->load($video['video_id']);             
                $video_data->setData("video_url",$video["videoUrl"]);
                $video_data->save();
            }
        }
    }
    
}