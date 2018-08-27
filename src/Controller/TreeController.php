<?php
/**
 * Created by PhpStorm.
 * User: rufus
 * Date: 26.08.2018
 * Time: 22:11
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TreeController extends AbstractController
{
    /**
     * @Route ("/tree")
     *
     */
    public function general():Response
    {
        $directory_finder = new DirectoriesController();
        $file_finder = new FileFindController();
        $request = Request::createFromGlobals();
        $dir = $request->query->get('dir');
        $name_of_file = $request ->query->get('name');
        if ($name_of_file)
        {
            return $this->render('index/finder.html.twig', $file_finder ->finder($name_of_file, $dir));
        }
        return $this->render('index/tree.html.twig', $directory_finder->tree($dir));
    }

}