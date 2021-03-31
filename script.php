<?php

require_once 'Controller.php';
require_once 'Television.php';
require_once 'Console.php';
require_once 'Microwave.php';
require_once 'ElectronicItems.php';

class Task
{

    private $items;

    public function __construct()
    {
        $console = new Console();
        $console->setPrice(rand(50,100));
        $controllers = [];
        for ($i = 0; $i < 4; $i++){
            $controller = new Controller();
            $controller->setPrice(rand(10,20));
            $controller->setWired(($i%2) ? 'wired' : 'remote');
            $controllers[] = $controller;
        }
        $console->setExtras($controllers);

        $TV1 = new Television();
        $TV1->setPrice(rand(100,200));
        $controllers = [];
        for ($i = 0; $i < 2; $i++){
            $controller = new Controller();
            $controller->setPrice(rand(10,20));
            $controller->setWired('remote');
            $controllers[] = $controller;
        }
        $TV1->setExtras($controllers);

        $TV2 = new Television();
        $TV2->setPrice(rand(100,200));
        $controllers = [];
        for ($i = 0; $i < 1; $i++){
            $controller = new Controller();
            $controller->setPrice(rand(10,20));
            $controller->setWired('remote');
            $controllers[] = $controller;
        }
        $TV2->setExtras($controllers);

        $microwave = new Microwave();
        $microwave->setPrice(rand(100,200));

        $this->items = [$console, $TV1, $TV2, $microwave];
    }

    public function question1(){
        print_r("Question 1\n");
        $result = new ElectronicItems($this->items);
        $items = $result->getSortedItems('price');

        self::outputResult($items);
        echo 'Total price = '.$result->getTotalPrice($items)."\n\n";
    }

    public function question2(){
        print_r("Question 2\n");
        $result = new ElectronicItems($this->items);
        $items = $result->getItemsByType('console');

        self::outputResult($items);
        echo 'Total price = '.$result->getTotalPrice($items)."\n\n";
    }

    private static function outputResult($data){
        $mask = "|%3.3s |%-20.20s |%5.5s |%7.7s |\n";
        printf($mask, 'ID', 'Type','price','wired');

        foreach ($data as $key => $item) {
            printf($mask, $key, $item->getType(),$item->price,'');

            if (is_array($item->getExtras())){
                foreach ($item->getExtras() as $extra) {
                    printf($mask, ' ', 'extra-'.$extra->getType(),$extra->price,$extra->getWIred());
                }
            }
            print_r("--------------------------------------------\n");
        }
    }
}

$result = new Task();
$result->question1();
$result->question2();