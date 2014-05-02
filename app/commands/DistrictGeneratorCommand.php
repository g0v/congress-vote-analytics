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

		foreach ($json_data_array as $level_1_key=>$level_1_data) {

			foreach ($level_1_data as $level_2_key=>$level_2_data) {

				$district_title = $level_1_key.$level_2_key;
				$district_description = '';

				foreach ($level_2_data as $level_3_key=>$level_3_data) {

					$district_description = $district_description.$level_3_key.'/';

				}

				$district_description = substr($district_description, 0, -1);

				if (!empty($district_description)) {

					echo "title: ".$district_title." \n";
					echo "description: ".$district_description." \n";

					$date = new \DateTime;

					/*DB::table('districts')->insert(
   		 				array(
   		 					'title' => $district_title,
   		 					'description' => $district_description,
   		 					'order' => 1,
   		 					'created_at' => $date,
							'updated_at' => $date
   		 				)
					);*/

				}

			}

		}


	}

}
