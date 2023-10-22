<?php

$rootPath = realpath("././");

$filesTo = array();
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    if (!$file->isDir())
    {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        if(substr($relativePath,0,4)!=='.git'){
            $filesTo[] = $filePath;
        }
    }
}

foreach ($filesTo as $file)
{
    unlink($file);
}
?>
