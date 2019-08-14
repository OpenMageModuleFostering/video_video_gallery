<?php
require_once 'Mage/Adminhtml/controllers/Catalog/ProductController.php';
class Mymodule_Videogallery_Adminhtml_Catalog_ProductController extends Mage_Adminhtml_Catalog_ProductController
{
    public function videosAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->renderLayout();
    }
}
