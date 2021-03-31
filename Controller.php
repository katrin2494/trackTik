<?php

require_once 'ElectronicItem.php';

class Controller extends ElectronicItem
{
    const MAX_EXTRAS = false;

    /**
     * Controller constructor.
     */
    public function __construct(){
        $this->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
    }
}