<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


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
        $workers = $dbFiller->getPreparedValues();
        dd($workers);
        DB::table('workers')->insert($workers);
    }
}
class DbFiller
{
    const MAX_DEEP = 5;
    const MIN_DEEP = 1;
    const NEEDED_ROWS = 5;


    public $employees = [
        1 => [
            'Chief Technical Oficer',
            'Team Lead',
            'Teach Lead'
        ],
        2 => [
            'Project Manager',
            'Software Architect'
        ],
        3 => [
            'Senior SE',
            'Senior QA'
        ],
        4 => [
            'Middle SE',
            'Middle QA',
            'System Administrator'
        ],
        5 => [
            'Junior SE',
            'Junior QA',
            'Technical Support'
        ]
    ];

    /**
     * @return array
     */
    public function getPreparedValues()
    {
        return $this->employees;
    }

    /**
     *
     */


    public function prepareDbValues()
    {
        $faker = Faker::create();
        for ($id = 1; $id <= self::NEEDED_ROWS; $id++) {
            $parentId = 'NULL';
            $deepLvl = mt_rand(self::MIN_DEEP, self::MAX_DEEP);
            while (empty($this->employees[$deepLvl-1]) && $deepLvl > self::MIN_DEEP) {
                $deepLvl--;
            }

            if (1 !== $deepLvl) {
                $parentId = array_rand($this->employees[$deepLvl-1], 1);
            }

            $this->employees[$deepLvl][$id] = [
                'id' => $id,
                'name' => $faker->name,
                'post' => array_rand($this->employees[$deepLvl], 1),
                'd_of_emp' => $faker->date(),
                'salary' => mt_rand(400, 2600),
                'parent_id' => $parentId
            ];


        }
    }
}