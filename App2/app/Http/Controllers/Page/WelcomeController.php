<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public $url_data = array(
        'page_title' => 'Two Window Select',
        'vue_component_data' => array(
            'response-data' => array(
                'error-code' => -1,
                'message' => '',
                'errors' => [],
            ),
            'list-data' => [
                'test line 1',
                'test line 2',
                'test line 3',
                'test line 4',
                'test line 5',
                'test line 6',
                'test line 7',
                'test line 8',
                'test line 9',
            ],
        ),
    );

    public function get()
    {
        $this->url_data['vue_component_data']['response-data']['error-code'] = -1;
        $this->url_data['vue_component_data']['response-data']['message'] = '';
        $this->url_data['vue_component_data']['response-data']['errors'] = [];

        return view('welcome', ['url_data' => $this->url_data]);
    }

    public function post(Request $request)
    {
        $response_data = $request->input('dataField');
        $json_data = json_decode($response_data);

        if (count($json_data) <= 5) {
            $error_code = 0;
        } else {
            $error_code = 1;
            array_push($this->url_data['vue_component_data']['response-data']['errors'],'Более 5 объектов');
        }
        $response_string = $error_code == 0 ? $response_data : 'Ошибка сервера';

        $this->url_data['vue_component_data']['response-data']['error-code'] = $error_code;
        $this->url_data['vue_component_data']['response-data']['message'] = $response_string . 'error code: ' . $error_code;
        $this->url_data['vue_component_data']['response-data']['errors'] ;

        return view('welcome', ['url_data' => $this->url_data]);
    }
}
