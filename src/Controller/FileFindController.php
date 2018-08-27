<?php

namespace App\Controller;


use App\Services\ResultChecker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;


class FileFindController extends AbstractController
{
    public function finder($name_of_file, $dir)
    {
        $finder = new Finder();
        $resultChecker = new ResultChecker();
        $finder->ignoreUnreadableDirs()->in('W://'.$dir)->files()->name('*'.$name_of_file.'*')->depth('< 5 ');
        $levelList = array();
        foreach ($finder as $file) {
            $tree = $file->getRealPath();
            $levelList[] = $tree;
        }
        return array (
            'data' => $resultChecker -> checker($levelList),
            'dir' => $dir,
            'name' => $name_of_file,
        );
    }
}