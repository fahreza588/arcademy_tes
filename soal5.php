<?php

function Sequence($num1, $num2)
{
    if ($num2 > $num1) {
        return " parameter x harus lebih besar dibanding y ";
    }

    $x1 = $num2;
    $x = array();
    $x[] += $x1;
    $div = 0;

    while ($x1 != 0 && $x1 != 1) {
        $x1 = pow(end($x), 2) % ($num1 + $div);
        $x[] += $x1;
        $div++;

    }
    $string = "Array : [";
    for ($i = 0; $i < count($x); $i++) {
        $string .= $x[$i];
        if ($i != (count($x) - 1)) {
            $string .= ',';
        }

    }
    $string .= ']';
    return "$string <br>Count : " . count($x);

}

echo " Input 1  : Sequence(5,3)";
echo "<br>";
echo " Output 1 : ";
print_r(Sequence(5, 3));
echo "<hr>";

echo " Input 1  : Sequence(16,5)";
echo "<br>";
echo " Output 1 : ";
print_r(Sequence(16, 5));
echo "<hr>";

echo " Input 1  : Sequence(3,5)";
echo "<br>";
echo " Output 1 : ";
print_r(Sequence(3, 5));
echo "<hr>";