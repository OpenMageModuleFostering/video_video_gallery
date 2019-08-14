<?php

class Mymodule_Videogallery_Model_Resource_Videos extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct()
    {
        $this->_init('videogallery/videos', 'video_id');
    }
}