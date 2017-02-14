<?php

use Illuminate\Database\Seeder;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        for($i=0;$i<100;$i++){
        	$temp['name']=str_random(4);
        	$temp['administrator']=str_random(5);
        	$temp['pass']=rand(1,6);
        	$temp['email']='468257821@qq.com';
        	$temp['phone']='18733741598';
        	$temp['token']=str_random(50);
        	$temp['status']=rand(0,1);
        	$data[]=$temp;
        }
        \DB::table('admin')->insert($data);
    }
}
