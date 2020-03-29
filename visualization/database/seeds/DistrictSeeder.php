<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $districts = [
            ['district'=> 'Colombo','count'=> 29,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>1],
            ['district'=> 'Kalutara','count'=> 17,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>2],
            ['district'=> 'Puttalam','count'=> 11,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>3],
            ['district'=> 'Gampaha','count'=> 10,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>4],
            ['district'=> 'Ratnapura','count'=> 3,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>5],
            ['district'=> 'Kurunegala','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>6],
            ['district'=> 'Galle','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>7],
            ['district'=> 'Kegalle','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>8],
            ['district'=> 'Batticoloa','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>9],
            ['district'=> 'Badulla','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>10],
            ['district'=> 'Jafna','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>11],
            ['district'=> 'Matara','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>12],
            ['district'=> 'Kandy','count'=> 1,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>13],
            ['district'=> 'Matale','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>14],
            ['district'=> 'Nuwara_Eliya','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>15],
            ['district'=> 'Hambantota','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>16],
            ['district'=> 'Kilinochchi','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>17],
            ['district'=> 'Mannar','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>18],
            ['district'=> 'Vavunia','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>19],
            ['district'=> 'Mulativu','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>20],
            ['district'=> 'Ampara','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>21],
            ['district'=> 'Trincomalee','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>22],
            ['district'=> 'Anuradhapura','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>23],
            ['district'=> 'Polonnaruwa','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>24],
            ['district'=> 'Monaragala','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>25],
            ['district'=> 'Kalmunei','count'=> 0,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>26],
            ['district'=> 'Quaranteen_Centers','count'=> 34,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>27],
            ['district'=> 'Foreigners','count'=> 3,'created_at'=>'2020-03-29 16:35','updated_at'=> '2020-03-29 16:35','id'=>28],
            ];
        \App\District::insert($districts);
    }
}
