<?php

declare(strict_types=1);
namespace Patterns\Singleton;

$a = "Dobryi Dien everybody";
$b = "I am Boris Johnson from London!";
echo $a . ', ' . $b;

const NEWLINE = '<br>';
define('NEWLINE_2', '<br><br>');

echo NEWLINE_2;

$c = NULL;
echo $c ?? "no-var";
echo NEWLINE;
$c = 3;
echo $c ?? "no-var";

$d = 0; // або 0.0 типу float
$e = "0"; // або NULL абощо

echo NEWLINE_2;

echo 'There are variables $d and $e. '; // у подвійних лапках вивело б значення змінних
if ($d == $e) {
    echo "They are both the same";
    if (empty($d)) {
        echo " and both are null. ";
        if ($d === $e) {
            echo 'They are both null in one data type!!!';
        }
        else {
            echo 'However, they have different data types.';
        }
    }
}
else {
    echo 'They are different';
}

echo NEWLINE_2;

$f = 8;
$var = 'f';
echo $$var;

echo NEWLINE_2;

if (6 > 5):
    echo 'Statement "6 > 5" is true';
endif;

echo NEWLINE_2;

echo <<<TEXT
    Lorem ipsum
    dolor sit amet
TEXT;

echo NEWLINE_2;

$num1 = 20;
$num2 = '10';

echo $num1 + $num2;
echo NEWLINE;
echo $num1 . $num2;

echo NEWLINE_2;

$fruits = array('Orange', 'Banana', 'Grapefruit');
// або $fruits = ['Orange', 'Banana', 'Grapefruit'];

$fruits[2] = 'Mandarin';
$fruits[] = 'Pineapple';
array_unshift($fruits, 'Apple');

echo '<pre>';
print_r($fruits);
echo '</pre>';

echo NEWLINE_2;

foreach ($fruits as $fruit) {
    echo $fruit . '<br>';
}

echo NEWLINE_2;

$week = [
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    7 => 'Sunday'
];
$day = 7;
echo "A day of the week with number $day is called " . $week[$day] . NEWLINE;
echo ($day >= 6) ? "It's a weekend!" : "It's just a workday";

echo NEWLINE_2;

$num3 = 9.1243432;
$num4 = (int)$num3;
$num5 = (float)$num4;

echo $num3, NEWLINE, $num4, NEWLINE, $num5;

echo NEWLINE_2;

function exponentiation($number, $power_index): float|int {
    return $number**$power_index;
}

echo exponentiation(5, 3);

echo NEWLINE_2;


$sentence_str = 'Lorem ipsum dolor sit amet';
$str_len = strlen($sentence_str);

$sentence_arr = explode(" ", $sentence_str);
$words_num = count($sentence_arr);

$sentence_str_new = implode(" ", $sentence_arr); //


echo "There was a sentence: \"$sentence_str\" with $str_len symbols.<br>
Exploding made an array of its words: <pre>";
print_r($sentence_arr);
echo "</pre>An array has $words_num words.<br>Imploding of array allowed us to get back to the string format.<br>";

if ($sentence_str === $sentence_str_new) {
    echo "The first string and a string made after imploding of array are identical.";
}
else {
    echo "But something went wrong.";
}

echo NEWLINE_2;

class Fruit {
    public int $id;
    public bool $ripeness = false;
    public string $color;

    public static int $quantity = 0;

    public function __construct($id, $color) {
        $this->id = $id;
        $this->color = $color;
        $this->ripeness = true;
        self::$quantity++;
    }
    public function __destruct() {
        echo "Fruit #$this->id has just been eaten or rotted<br>";
    }
    public function consume_request(): void {
        echo "Fruit #$this->id: \"Eat me!\"<br>";
    }
}

class Apple extends Fruit{
    public bool $warms_inside = false;
    public function __construct($id, $color, $warms_inside)
    {
        parent::__construct($id, $color);
        $this->warms_inside = $warms_inside;
        echo "An apple has been grown by us. Fruit number: $id<br>";
    }
}

class Orange extends Fruit {

    public int $seeds_quantity_inside;
    public function __construct($id, $seeds_quantity_inside)
    {
        parent::__construct($id, 'orange');
        $this->seeds_quantity_inside = $seeds_quantity_inside;
        echo "An orange has been grown by us. Fruit number: $id<br>";
    }
}

echo 'The number of fruits is ' . Fruit::$quantity . '. ' . 'Let\'s grow some fruits!';

echo NEWLINE_2;
$apple1 = new Apple(1, 'green', false);
$apple2 = new Apple(2, 'red', false);
$orange1 = new Orange(3, 4);
$orange2 = new Orange(4, 6);
$orange3 = new Orange(5, 3);

echo NEWLINE;
echo 'Now we have ' . Fruit::$quantity . ' fruits!';

echo NEWLINE_2;
$apple2->consume_request();
if ($apple2->warms_inside) {
    $warms = 'some';
}
else {
    $warms = 'no';
}
echo "It's a $apple2->color apple with " . $warms . " warms inside.";

echo NEWLINE_2;
$orange1->consume_request();
echo "It's an orange with $orange1->seeds_quantity_inside seeds inside.";

echo NEWLINE_2;

class Entity {
    public array $attributes_arr = [];
    public static $instance;

    public function __construct() {}
    public function __clone() {}
    public function __wakeup() {}

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new static;
        }
        return self::$instance;
    }

    public function getAttribute(string $key) {
        return $this->attributes_arr[$key];
    }
    public function setAttribute(string $key, $value): void {
       $this->attributes_arr[$key] = $value;
    }
}

$ent = Entity::getInstance();
$ent->setAttribute("size", 5);
echo $ent->getAttribute("size");
unset($ent);
echo NEWLINE;

$another_ent = Entity::getInstance();
echo $another_ent->getAttribute("size");


echo NEWLINE_2;
