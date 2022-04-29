<?php

namespace App\Widgets;

use Klisl\Widgets\Contract\ContractWidget;
use Illuminate\Http\Request;

class LabelMenuWidget implements ContractWidget
{

    public $filterParams;
    private $labelLink;

    public function __construct($data)
    {
        $this->filterParams = $data['filterParams'];

        $pagesWhereNeedLabels = array('metro', 'rayon', 'national', 'place');

        $url = $_SERVER['REQUEST_URI'];

        if (strstr($url, '?page')) $url = strstr($url, '?page', true);

        foreach ($this->filterParams as $item){

            switch ($item->short_name) {

                case 'metro' :

                    $linkUrl = '/'.$item->filter_url.'/do-3000';

                    if ($linkUrl != $url)

                    $this->labelLink[] = array( 'url' => $linkUrl, 'value' => 'Недорогие рядом');

                    break;

                case 'rayon' :

                    $linkUrl = '/'.$item->filter_url.'/do-3000';

                    if ($linkUrl != $url)

                    $this->labelLink[] = array( 'url' => $linkUrl, 'value' => 'Недорогие в этом районе');

                    break;

                case 'national' :

                    $linkUrl = '/'.$item->filter_url.'/do-3000';

                    if ($linkUrl != $url)

                    $this->labelLink[] = array( 'url' => $linkUrl, 'value' => 'Недорогие');

                    break;

                case 'place' :

                    $linkUrl = '/'.$item->filter_url.'/do-3000';

                    if ($linkUrl != $url)

                    $this->labelLink[] = array( 'url' => $linkUrl, 'value' => 'Недорогие');

                    break;

            }

        }
    }

    public function execute()
    {
        return view('Widgets::labels', [
            'labelList' => $this->labelLink,
        ]);
    }
}
