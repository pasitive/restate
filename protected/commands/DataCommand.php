<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 6/15/12
 * Time: 4:00 PM
 * To change this template use File | Settings | File Templates.
 */
class DataCommand extends CConsoleCommand
{

    public function actionGenerate($v = 1)
    {

        for ($i = 1; $i < $v + 1; $i++) {
            $apartment = new Apartment();
            $apartment->attributes = array(
                'city_id' => 2,
                'area_id' => 2,
                'type_id' => 4,
                'metro_id' => mt_rand(1, 163),
                'metro_name' => 'test metro',
                'area_name' => 'test area',
                'city_name' => 'test city',
                'type_name' => 'test type',
                'default_image' => '/upload/ApartmentFile/7d/42/8b/7d428b94cd4a256d57f9272d198eeb6984b86a_150.jpg',
                'container' => 0,
                'is_rent' => mt_rand(0, 1),
                'price' => mt_rand(100, 10000000),
                'room_number' => mt_rand(1, 10),
                'square' => mt_rand(10, 250),
                'square_live' => mt_rand(10, 250),
                'square_kitchen' => mt_rand(10, 250),
                'parent_name' => 'test parent name',
                'floor' => mt_rand(1, 21),
                'wc_number' => mt_rand(1, 4),
                'user_id' => 1,
                'is_published' => 1,
            );
            $apartment->save();
            if ($i % 100 == 0) print "Generated {$i} apartments\n";
            flush();
        }
    }

}
