<?php
//ToDo: read this tutorial -> https://codeinphp.github.io/post/creating-your-own-artisan-in-php/
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
			$this->create_migrationFile($fileName);
			$result = '<question>Migration file ' . $fileName . ' is created..</question>';
		}

		if ($input->getOption($this->commandOptionName)) {
			$result = '<question>Migration file ' . $fileName . ' is created, in another way..</question>';;
		}

		$output->writeln($result);
	}

	private function create_migrationFile($fileName) {
		$date = new DateTime();
		$timestamp = $date->format('YmdHis');

		$tableName = strtolower($fileName);
		$migrationFile = $_SERVER['DOCUMENT_ROOT'] . 'application/database/migrations/' . $timestamp . '_' . $fileName . '.php';

		$migration = fopen($migrationFile, "w") or die("Unable to create migration file!");

		//ToDo: find a better and cleaner way to do this..
		$migrationTable = <<< EOT
<?php

class Migration_$fileName extends CI_Migration {

	public function up() {
		\$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			)
		));
		\$this->dbforge->add_key('id', TRUE);
		\$this->dbforge->create_table('$tableName');
	}

	public function down() {
		\$this->dbforge->drop_table('$tableName');
	}

}
EOT;
		fwrite($migration, $migrationTable);
		fclose($migration);
	}

}
