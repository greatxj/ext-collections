--TEST--
Test Collection::copyOfRange();
--FILE--
<?php
// An ordinary array.
$array = [3, 7, 6, 9, 2];
// An associative array, however, Collection::copyOfRange() still works,
// and string keys will be preserved.
// Note that zend_array is ordered and random access has constant time complexity.
$array1 = ['a' => 'b', 'c', 'd' => 'e'];
$array2 = Collection::init($array)->copyOfRange(2, 4)->toArray();
$array3 = Collection::init($array1)->copyOfRange(1, 2)->toArray();
if ($array2 != array_slice($array, 2, 4) || $array3 != array_slice($array1, 1, 2))
    echo 'Collection::copyOfRange() failed.', PHP_EOL;
?>
--EXPECT--
