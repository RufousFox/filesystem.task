<?php

namespace App\Services;


use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;


class treeGenerator
{
    public function generator($dir, $type)
    {

        $finder = new Finder();
        $response = new Response();
        try {
        $finder->ignoreUnreadableDirs()->in('W://'.$dir)->$type()->depth('< 1 ');
        } catch (\InvalidArgumentException  $e)
        {
            return $levelList = array();
        }
        $levelList = array();
        foreach ($finder as $file) {
            $tree = $file->getRelativePathname();
            $levelList[] = $tree;
        }
        return $levelList;
    }
}