<?php

namespace App\Controller;


use App\Services\FileFinder;
use App\Services\ResultChecker;
use App\Services\treeGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DirectoriesController extends AbstractController
{
    public function tree($dir)
    {
        $treeGenerator = new treeGenerator();
        $resultChecker = new ResultChecker();
        $request = Request::createFromGlobals();
        $back_dir = dirname($dir);
        return array(
            'tree' => $resultChecker -> checker($treeGenerator -> generator($dir, "directories")),
            'files' => $resultChecker -> checker($treeGenerator -> generator($dir, "files")),
            'dir' => $dir,
            'back_dir' => $back_dir,
        );
    }
}