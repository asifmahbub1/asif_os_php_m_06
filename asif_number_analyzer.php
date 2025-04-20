<?php
// Console-based Number Analyzer without using built-in functions

function isValidInput($numbers) {
    foreach ($numbers as $num) {
        if (!is_numeric($num)) {
            return false;
        }
    }
    return true;
}

function calculateMax($arr) {
    $max = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    return $max;
}

function calculateMin($arr) {
    $min = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $min) {
            $min = $arr[$i];
        }
    }
    return $min;
}

function calculateSum($arr) {
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
    }
    return $sum;
}

function calculateAverage($arr) {
    $total = calculateSum($arr);
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $count++;
    }
    return $count > 0 ? $total / $count : 0;
}

while (true) {
    echo "Enter a list of numbers separated by spaces (or type 'exit' to quit): ";
    $input = trim(fgets(STDIN));

    if (strtolower($input) === "exit") {
        echo "Exiting program. Goodbye!\n";
        break;
    }

    $inputArray = preg_split('/\s+/', $input);

    if (!isValidInput($inputArray)) {
        echo "❌ Invalid input. Please enter only numbers separated by spaces.\n\n";
        continue;
    }

    // Convert strings to float manually
    $numbers = [];
    for ($i = 0; $i < count($inputArray); $i++) {
        $numbers[$i] = (float)$inputArray[$i];
    }

    $max = calculateMax($numbers);
    $min = calculateMin($numbers);
    $sum = calculateSum($numbers);
    $avg = calculateAverage($numbers);

    echo "\n=== Results ===\n";
    echo "Maximum: $max\n";
    echo "Minimum: $min\n";
    echo "Sum: $sum\n";
    echo "Average: " . number_format($avg, 2) . "\n\n";
}
?>
