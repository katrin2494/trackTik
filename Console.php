<?php

require_once 'ElectronicItem.php';

class Console extends ElectronicItem
{
    const MAX_EXTRAS = 4;

    /**
     * Console constructor.
     */
    public function __construct()
	{
        $this->setType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
    }
}