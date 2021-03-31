<?php

require_once 'ElectronicItem.php';

class ElectronicItems
{
    private $items = array();

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested. Supported types are price,extra's count,type
     *
     * @param string $type
     * @return array
     */
    public function getSortedItems(string $type): array
	{
        $sorted = $this->items;

        switch ($type) {
            case 'price':
                usort($sorted, fn($a, $b) => $a->price > $b->price);
                break;
            case 'type':
                usort($sorted, fn($a, $b) => strcmp($a->getType(), $b->getType()));
                break;
            case 'extra':
                usort($sorted, function ($a, $b) {
                    $a_extras = is_array($a->getExtras()) ? count($a->getExtras()) : 0;
                    $b_extras = is_array($b->getExtras()) ? count($b->getExtras()) : 0;
                    return $a_extras > $b_extras;
                });
                break;
        };

        foreach ($sorted as $item) {
            if (!is_null($item->getExtras())) {
                $extra_items = new ElectronicItems($item->getExtras());
                $sorted_extras = $extra_items->getSortedItems($type);
                $item->setExtras($sorted_extras);
            }
        }
        return $sorted;
    }

    /**
     * Returns the items depending on requested type
	 *
     * @param string $type
     * @return array
     */
    public function getItemsByType(string $type): array
	{
        $items = [];
        if (in_array($type, ElectronicItem::getTypes())) {
            $callback = function ($item) use ($type) {
                return $item->getType() == $type;
            };
            $items = array_filter($this->items, $callback);
        }
        return $items;
    }

	/**
	 * Returns the total price of items
	 *
	 * @param array $items
	 * @return int
	 */
    public function getTotalPrice(array $items): int
	{
        $total = 0;
        foreach ($items as $item) {
            $total += $item->price;
            if (is_array($item->getExtras())) {
                foreach ($item->getExtras() as $extra) {
                    $total += $extra->price;
                }
            }
        }
        return $total;
    }
}