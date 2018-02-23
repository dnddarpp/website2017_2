<pre><?php
$dir    = 'images';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
?>
</pre>
<pre><?php
$dir    = 'images';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files2);
?>
</pre>
