<?php

class Mymodule_Videogallery_Block_Adminhtml_Videobox extends Mage_Adminhtml_Block_Abstract
{
    public function _construct() {
        parent::_construct();
        if(Mage::getStoreConfig('videogallery/general/enable'))
        $this->setTemplate('videogallery/videobox.phtml');
    }
    
    protected function _prepareLayout()
    {
        if(Mage::getStoreConfig('videogallery/general/enable')):
        $this->setChild('delete_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => Mage::helper('catalog')->__('Delete Video'),
                    'class' => 'delete delete-video ',
                ))
        );
        endif;
        
        return parent::_prepareLayout();
    }
    
    public function getFieldName()
    {
        return 'product[videos]';
    }
    
    public function getFieldId()
    {
        return 'product_video';
    }
    
    public function getVideoIdCount()
    {
        $video = Mage::getModel("videogallery/videos")->getCollection()->addFieldToFilter("video_product_id",$this->getRequest()->getParam("id"));
        return count($video->getData()) + 1;
    }
    
    public function getVideoData() {
        $video = Mage::getModel("videogallery/videos")->getCollection()->addFieldToFilter("video_product_id",$this->getRequest()->getParam("id"))->setOrder('video_id', 'ASC');
        return $video->getData();
    }


    public function getDeleteButtonHtml()
    {
        return $this->getChildHtml('delete_button');
    }
}
?>
