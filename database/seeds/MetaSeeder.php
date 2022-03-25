<?php

use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = array();

        $data[] = [
            'url' => '/',
            'title' => 'Реальные проститутки :city2 Все  индивидуалки :city2 собраны тут',
            'des' => 'Надоели  разводы на деньги   и толпы иммигранток  из средней  Азии тогда заходи только здесь тебя  ждет полный список  проституток :city2 с отзывами и  обзорами  от уважаемых клиентов.',
            'h1' => 'Проститутки :city2',
        ];

        $data[] = [
            'url' => 'default',
            'title' => '[:cena] проститутки [:price] [:age] [:time] [:place] [:intimhair] [:hair] [:national2] [ у метро :metro] [ в районе :rayon] [с услугой :service2] :city3 ',
            'des' => 'Здесь собраны [:cena] проститутки [:price] [:age] [:place] [:intimhair] [:hair] [:national2] [которые находятся рядом с :metro] [которые находятся в районе :rayon]  [с услугой :service2]  :city3 , анкеты индивидуалок, номера телефонов и честные отзывы',
            'h1' => '[:cena] проститутки [:price] [:age] [:time] [:place] [:national2] [:intimhair] [:hair] [ у метро :metro] [ в районе :rayon] [с услугой :service2] ',
        ];

        DB::table('metas')->insert($data);
    }
}
