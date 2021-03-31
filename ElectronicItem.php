<?php


class ElectronicItem
{
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    private $type;
    public $wired;

    /**
     * @var array
     */
    private $extras;

    const MAX_EXTRAS = null;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';

    private static $types = array(self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE, self::ELECTRONIC_ITEM_TELEVISION,self::ELECTRONIC_ITEM_CONTROLLER);

    function getPrice()
    {
        return $this->price;
    }

    function getType()
    {
        return $this->type;
    }

    function getWired()
    {
        return $this->wired;
    }

	/**
	 * Returns the array of items types
	 *
	 * @return string[]
	 */
    static function getTypes(): array
	{
        return self::$types;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function setWired($wired)
    {
        $this->wired = $wired;
    }

    function getExtras()
    {
        return $this->extras;
    }

    function setExtras($extras)
    {
        if (!self::maxExtras($extras)) throw new Exception('Max extras is '.self::MAX_EXTRAS);

        $this->extras = $extras;
    }

	/** Limit the max extras
	 *
	 * @param array $extras
	 * @return bool
	 */
    public static function maxExtras(array $extras): bool
	{
        if (is_null(self::MAX_EXTRAS)) return true;
        if (self::MAX_EXTRAS === false) return false;

        return count($extras) <= self::MAX_EXTRAS;
    }
}