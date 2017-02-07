<?php

use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent\Model;
class InsertGoodsSeeder extends Seeder
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
        	$temp['goods']= str_random(4);
        	$temp['cate']= str_random(10);
        	$temp['company']= str_random(10);
        	$temp['descr']= str_random(20);
        	$temp['price']=rand(1,888);
        	$temp['state']=rand(1,3);
        	$temp['store']= str_random(10);
        	$temp['num']=rand(1,100000);
        	$temp['clicknum']=rand(1,100000);
        	$temp['picname']='/uploads/14848803031510.png';
        	$data[]=$temp;
        }
        \DB::table('goods')->insert($data);
    }
}
