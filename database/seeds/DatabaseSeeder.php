<?php

use App\Sign;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $signsAry[0]="牡羊座";
        $signsAry[1]="金牛座";
        $signsAry[2]="雙子座";
        $signsAry[3]="巨蟹座";
        $signsAry[4]="獅子座";
        $signsAry[5]="處女座";
        $signsAry[6]="天秤座";
        $signsAry[7]="天蠍座";
        $signsAry[8]="射手座";
        $signsAry[9]="摩羯座";
        $signsAry[10]="水瓶座";
        $signsAry[11]="雙魚座";

        foreach ($signsAry as $key => $sign) {
            $signObj = new Sign();
            $signObj->number = $key;
            $signObj->name = $sign;
            $signObj->save();
        }
    }
}
