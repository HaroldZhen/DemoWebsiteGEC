<?php
$d = dir("./");
echo "Handle: " . $d->handle . "\n";
echo "Path: " . $d->path . "\n";
while (false !== ($entry = $d->read())) {
    if (substr($entry,-4)=="html") {
        echo $entry;
        $filename = $entry;
        $handle1 = fopen($filename, "r");
        $contents = fread($handle1, filesize($filename));
        $contents1 = str_replace(".html", ".php", $contents );
        fclose($handle1);
        if ($contents<>$contents1) {
            $fp = fopen($filename , 'w');
            fwrite($fp, $contents1);
            fclose($fp);
        }
    }
}
$d->close();
?>
