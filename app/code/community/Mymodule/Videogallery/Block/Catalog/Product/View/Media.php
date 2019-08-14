<?php
class Mymodule_Videogallery_Block_Catalog_Product_View_Media extends Mage_Catalog_Block_Product_View_Media
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getVideoCollection(){
        $product=$this->getProduct();
        $video = Mage::getModel("videogallery/videos")->getCollection()->addFieldToFilter("video_product_id",$product->getId())->setOrder('video_id', 'ASC');
        return $video;
    }
    
    public function getVideoEmbedUrl($videoUrl){
        $youtubeId= ltrim(substr($videoUrl, strrpos($videoUrl, "v="), strlen($videoUrl)),"v=");
        return "//www.youtube.com/embed/".$youtubeId;
    }
    
    public function getVideoImage($videoUrl){
        $youtubeId= ltrim(substr($videoUrl, strrpos($videoUrl, "v="), strlen($videoUrl)),"v=");
        return "http://img.youtube.com/vi/".$youtubeId."/1.jpg";
    }
    
}