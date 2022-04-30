# PHP function like Python's f-string function
PHP `fprint` function like Python's f-strings function

* Inspired by Python's [Formatted string literals](https://docs.python.org/3/tutorial/inputoutput.html) (f-strings) function
* Print the variables' value inside a string

## Usage

```php
require_once __DIR__ . '/fprint.php';

$fruit = "apple";
$prize = 123.45;
$input = 'Prize of {fruit} yesterday is $ {prize}';
echo fprint($input) . PHP_EOL;
// expected result: Prize of apple yesterday is $ 123.45

$boolean_value = true;
$input = "Is today a sunny day? {boolean_value}";
echo fprint($input) . PHP_EOL;
// expected result: Is today a sunny day? TRUE

$null_value = NULL;
$input = "My wallet is {null_value}";
echo fprint($input) . PHP_EOL;
// expected result: My wallet is NULL

$array_value = [""];
$input = "My book list is {array_value}";
echo fprint($input) . PHP_EOL;
/* expected result:
My book list is Array
(
    [0] => 
)
*/

```