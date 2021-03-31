<?php
require_once 'ElectronicItem.php';

class Television extends ElectronicItem
{
    const MAX_EXTRAS = null;

    /**
     * Television constructor.
     */
    public function __construct(){
        $this->setType(ElectronicItem::ELECTRONIC_ITEM_TELEVISION);
    }
}