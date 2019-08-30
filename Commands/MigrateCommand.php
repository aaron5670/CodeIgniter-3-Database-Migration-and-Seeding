<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command {
	protected $commandName = 'migrate';
	protected $commandDescription = "Create a migration file (USAGE: <comment>php app migrate [filename]</comment>)";

	protected $commandArgumentName = "File name";
	protected $commandArgumentDescription = "This command creates a migration file";

	protected $commandOptionName = "option"; // should be specified like "php app migrate fileName --option"
	protected $commandOptionDescription = 'If set, it wil do another action';

	protected function configure() {
		$this
			->setName($this->commandName)
			->setDescription($this->commandDescription)
			->addArgument(
				$this->commandArgumentName,
				InputArgument::REQUIRED,
				$this->commandArgumentDescription
			)
			->addOption(
				$this->commandOptionName,
				null,
				InputOption::VALUE_NONE,
				$this->commandOptionDescription
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$fileName = $input->getArgument($this->commandArgumentName);

		if ($fileName) {
			//ToDo: creating migration file
			$result = '<question>Migration file ' . $fileName . ' is created..</question>';
		}

		if ($input->getOption($this->commandOptionName)) {
			$result = '<question>Migration file ' . $fileName . ' is created, in another way..</question>';;
		}

		$output->writeln($result);
	}
}
