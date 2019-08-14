<?php
class Mymodule_Videogallery_Block_Adminhtml_Catalog_Product_Edit_Tabs extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if(Mage::getStoreConfig('videogallery/general/enable')):
            if($this->getRequest()->getModuleName()=="admin" && $this->getRequest()->getControllerName()=="catalog_product"){
                if(($this->getRequest()->getParam("set") && $this->getRequest()->getActionName()=="new") || $this->getRequest()->getActionName()=="edit"){
                    $this->addTab('videos', array(
                        'label' => Mage::helper('catalog')->__('Videos'),
                        'url'   => $this->getUrl('*/*/videos', array('_current' => true)),
                        'class' => 'ajax',
                     ));
                }
            }
        endif;
    }
}
?>
