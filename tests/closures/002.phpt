--TEST--
Check closures in arginfo/argv (FAIL)
--SKIPIF--
<?php
if (!extension_loaded('parallel')) {
	echo 'skip';
}
?>
--FILE--
<?php
$runtime = new \parallel\Runtime;

try {
    $runtime->run(function(Closure $arg) : Closure {
        return $closure;
    }, [function(){
        return true;
    }]);
} catch (\parallel\Runtime\Error\IllegalReturn $ex) {
    var_dump($ex->getMessage());
}
?>
--EXPECT--
string(33) "illegal return (object) from task"

