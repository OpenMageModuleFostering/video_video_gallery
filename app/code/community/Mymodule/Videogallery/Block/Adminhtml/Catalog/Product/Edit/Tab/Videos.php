<?php

class Mymodule_Videogallery_Block_Adminhtml_Catalog_Product_Edit_Tab_Videos extends Mage_Adminhtml_Block_Widget
{
    public function __construct()
    {
        parent::__construct();
    }


    protected function _prepareLayout()
    {
        if(Mage::getStoreConfig('videogallery/general/enable')):
        $this->setChild('add_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label' => Mage::helper('catalog')->__('Add New Video'),
                    'class' => 'add',
                    'id'    => 'add_new_defined_video'
                ))
        );

        $this->setChild('videos_box',
            $this->getLayout()->createBlock('videogallery/adminhtml_videobox')
        );
        
        endif;

        return parent::_prepareLayout();
    }

    public function getAddButtonHtml()
    {
        return $this->getChildHtml('add_button');
    }

    public function getVideosBoxHtml()
    {
        return $this->getChildHtml('videos_box');
    }
}
