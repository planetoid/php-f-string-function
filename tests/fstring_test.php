<?php

require_once __DIR__ . '/../fprint.php';

$data = 1;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: 1';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = 1.2;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: 1.2';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = NULL;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: NULL';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = "foo";
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: foo';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = true;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: TRUE';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = false;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: FALSE';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = [];
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: Array
(
)
';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$data = new stdClass;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: stdClass Object
(
)
';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

$object = new stdClass;
$object->title = "apple";
$data = $object->title;
$input = "input: {data}";
$actual = fprint($input);
$expected = 'input: apple';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;


$filename = __DIR__ . '/../README.md';
$data = fopen( $filename, "r" );
$actual = fprint($input);
$expected = 'input: Resource id #6';
echo gettype($data) . ': ' . assertValue($expected, $actual) . PHP_EOL;

function assertValue($expected, $actual){
    if($expected === $actual){
        return "passed";
    }

    return "failed";
}