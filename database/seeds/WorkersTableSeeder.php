<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbFiller = new DbFiller();
        $a = $dbFiller->getPreparedValues();


        $workers = array_reduce($a, 'array_merge', array());

        $chunks = array_chunk($workers, 1000);

        foreach ($chunks as $chunk) {
            DB::table('workers')->insert($chunk);
        }


    }
}
class DbFiller
{
    const MAX_DEEP = 5;
    const MIN_DEEP = 1;
    const NEEDED_ROWS =200;

    public $employees = [
        1 => [],
        2 => [],
        3 => [],
        4 => [],
        5 => []
    ];

    public $post = [
        1 => [
            1 => 'Chief Technical Oficer',
            2 => 'Team Lead',
            3 => 'Teach Lead'
        ],
        2 => [
            1 => 'Project Manager',
            2 => 'Software Architect'
        ],
        3 => [
            1 => 'Senior SE',
            2 => 'Senior QA'
        ],
        4 => [
            1 => 'Middle SE',
            2 => 'Middle QA',
            3 => 'System Administrator'
        ],
        5 => [
            1 => 'Junior SE',
            2 => 'Junior QA',
            3 => 'Technical Support'
        ]
    ];

    /**
     * @return array
     */
    public function getPreparedValues()
    {
        $this->prepareDbValues();
        return $this->employees;
    }

    /**
     *
     */


    public function prepareDbValues()
    {
        $faker = Faker::create();
        for ($id = 1; $id <= self::NEEDED_ROWS; $id++) {
            $parentId = NULL;
            $deepLvl = mt_rand(self::MIN_DEEP, self::MAX_DEEP);
            while (empty($this->employees[$deepLvl-1]) && $deepLvl > self::MIN_DEEP) {
                $deepLvl--;
            }

            if (1 !== $deepLvl) {
                $parentId = array_rand($this->employees[$deepLvl-1], 1);
            }


            $j = mt_rand(1, count($this->post[$deepLvl]));



            $this->employees[$deepLvl][$id] = [
                'id' => $id,
                'name' => $faker->name,
                'post' => $this->post[$deepLvl][$j],
                'DateEmp' => $faker->date(),
                'salary' => mt_rand(400, 2600),
                'parent_id' => $parentId
            ];


        }
    }
}