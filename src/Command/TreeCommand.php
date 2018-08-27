<?php

namespace App\Command;

use App\Controller\DirectoriesController;
use App\Controller\FileFindController;
use function PHPSTORM_META\type;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TreeCommand extends Command
{
    protected static $defaultName = 'tree';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('Directory', InputArgument::OPTIONAL, 'Directory from W://')
            ->addArgument('File',  InputArgument::OPTIONAL, 'Name of file to search');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $treeGenerator = new DirectoriesController();
        $file_finder = new FileFindController();
        $io = new SymfonyStyle($input, $output);
        $directory = $input->getArgument('Directory');
        $filename = $input->getArgument('File');
        if ($filename) {
            $io->listing(($file_finder->finder($filename, $directory))['data'][0]);
        }
        else {
            $io->title('Directories:');
            $io->listing(($treeGenerator->tree($directory))['tree'][0]);
            $io->title('Files:');
            $io->listing(($treeGenerator->tree($directory))['files'][0]);
            $io->block('Input (tree [directory] [file name]) for search file in directories ');

        }
    }
}
