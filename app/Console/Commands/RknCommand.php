<?php

namespace App\Console\Commands;

use App\Models\BlockDomain;
use App\Models\City;
use App\Models\CityBlock;
use Illuminate\Console\Command;

class RknCommand extends Command
{
    protected $signature = 'rkn';

    protected $description = 'Command description';

    public function handle(): void
    {
        $allBlockSites = $this->getAllBlock();

        $cityList = City::all();

        $domains = array();

        foreach ($cityList as $city) {
            $domains[] = $city->domain;
        }

        $domains = array_unique($domains);

        $blockDomains = $this->getBlockCity($allBlockSites, $domains, $cityList);

        if ($blockDomains) {

            if (isset($blockDomains['city'])) {

                foreach ($blockDomains['city'] as $blockCityItem) {

                    $this->prepareAddNewBlock($blockCityItem);

                }

            }

            if (isset($blockDomains['domain'])) {

                foreach ($blockDomains['domain'] as $blockDomain) {

                    $this->addBlockDomain($blockDomain);

                }

            }

        }

    }

    private function prepareAddNewBlock($blockCityItem){

        $blockCityItemNum = preg_replace('/[^0-9]+/', '', $blockCityItem);

        if ($blockCityItemNum) {

            $cityUrl = preg_replace('/[0-9]+/', '', $blockCityItem);

            $blockCityItemNum = $blockCityItemNum + 1;

            $newCityUrl = $cityUrl . $blockCityItemNum;

        } else {

            $cityUrl = $blockCityItem;

            $newCityUrl = $cityUrl . 1;

        }

        $this->addNewBlock($cityUrl, $blockCityItem, $newCityUrl);

    }

    private function addNewBlock($cityUrl, $blockCityItem, $newCityUrl)
    {

        $cityInfo = City::where(['url' => $cityUrl])->first();

        $oldCity = $blockCityItem.'.'.$cityInfo->domain;

        if (!CityBlock::where(['old_city' => $oldCity])->first()) {

            $newCityBlock = new CityBlock();

            $newCityBlock->old_city = $oldCity;
            $newCityBlock->new_city = $newCityUrl;
            $newCityBlock->city_id = $cityInfo->id;
            $newCityBlock->created_at = time();

            $newCityBlock->save();

        }

    }

    private function addBlockDomain($domain){

        $blockDomain = new BlockDomain();
        $blockDomain->domain = $domain;
        $blockDomain->created_at = time();
        $blockDomain->save();

    }

    private function getBlockCity($allBlockSites, $domains, $cityList)
    {
        $blockDomains = array();

        if ($allBlockSites) {

            foreach ($allBlockSites as $key => $value) {

                foreach ($domains as $domain) {

                    if ($value == $domain) {

                        $blockDomains['domain'][] = $domain;

                    }

                    if (strpos($value, $domain)) {

                        foreach ($cityList as $cityItem) {

                            /* @var $cityItem City */

                            if ($cityItem->actual_city) {

                                $tempName = $cityItem->actual_city . '.' . $cityItem->domain;

                                if ($value == $tempName) {

                                    $blockDomains['city'][] = $cityItem->actual_city;

                                }
                            } else {

                                $tempName = $cityItem->url . '.' . $cityItem->domain;

                                if ($value == $tempName) {

                                    $blockDomains['city'][] = $cityItem->url;

                                }

                            }

                        }

                    }

                }

            }

        }

        return $blockDomains;
    }

    private function getAllBlock(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://reestr.rublacklist.net/api/v3/domains/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $server_output = curl_exec($ch);

        $result = json_decode($server_output);

        return $result;

    }

}
