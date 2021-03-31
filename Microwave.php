<?php

require_once 'ElectronicItem.php';

class Microwave extends ElectronicItem
{
    const MAX_EXTRAS = false;

    /**
     * Microwave constructor.
     */
    public function __construct(){
        $this->setType(ElectronicItem::ELECTRONIC_ITEM_MICROWAVE);
    }

}