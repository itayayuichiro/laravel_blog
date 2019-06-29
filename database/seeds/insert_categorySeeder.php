<?php

use Illuminate\Database\Seeder;

class insert_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('id'=>1,'name'=>'IT'),
            array('id'=>2,'name'=>'とうらぶ')
        );
        for( $i = 0 ; $i < 3 ; $i++) {
            $category = new Category;
            $category->id = $data[$i]["id"];
            $category->name = $data[$i]["name"];
            $category->save();
        }
    }
}
