<?php
/**
 * Created by PhpStorm.
 * User: gaffey
 * Date: 19-7-11
 * Time: 上午10:30
 */
$it = new FilesystemIterator('.');  // 点为当前目录
foreach ($it as $fileInfo) {    //这里是没有 key 的
    printf("%s\t%s\t%8s\t%s\n",
        date("Y-m-d H:i:s", $fileInfo->getMTime()), //获得修改时间
        $fileInfo->isDir() ? "<DIR>" : "",               //是否是文件夹
        number_format($fileInfo->getSize()),                 //文件大小
        $fileInfo->getFileName()                             //文件名
        );
}