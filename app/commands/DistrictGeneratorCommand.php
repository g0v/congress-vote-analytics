<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DistrictGeneratorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'district:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate districts data.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$json_data = file_get_contents('https://raw.githubusercontent.com/myang-git/taiwan-electoral-data/master/electoral-districts.json');
		$json_data_array = json_decode($json_data, true);
		var_dump($json_data_array);

		//DB::statement('ALTER TABLE user_facebook_accounts MODIFY COLUMN user_id int unsigned');

	}

}
