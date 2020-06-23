<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\GitHubService;
use App\Service\BitbuckedService;

class GitLastCommitCommand extends Command
{
    protected static $defaultName = 'app:get-last-commit';

    public function __construct(GitHubService $gitHubService, BitbuckedService $bitbuckedService)
    {
        parent::__construct();

        $this->gitHubService = $gitHubService;
        $this->bitbuckedService = $bitbuckedService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Get last commit from repository.')
            ->addArgument('repository', InputArgument::REQUIRED, 'user/repository name')
            ->addArgument('branch', InputArgument::REQUIRED, 'Branch name.')
            ->addArgument('git-service', InputArgument::OPTIONAL, 'git service name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument('git-service') === "bitbucked") {
            $service = $this->bitbuckedService;
        } else {
            $service = $this->gitHubService;
        }

        $service->setRepository($input->getArgument('repository'));
        $service->setBranch($input->getArgument('branch'));
        $output->writeln($service->execute());

        return Command::SUCCESS;
    }
}