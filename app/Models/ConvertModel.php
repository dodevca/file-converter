<?php

namespace App\Models;

use CodeIgniter\Model;
use \ConvertApi\ConvertApi;

class ConvertModel extends Model
{
    public function __construct()
    {
        $this->$apiKey  = env('MIDTRANS_SERVER_KEY');
        $this->$baseUrl = 'https://api.freeconvert.com/v1/';
    }

    public function option($input): ?array
    {
        $curl       = \Config\Services::curlrequest();
        $response   = $curl->request('GET', "{$this->baseUrl}query/formats/convert?apikey={$this->apiKey}&output_format={$input}");
        $data       = null;

        if($response->getStatusCode() != 200)
            return null;

        $responseData = json_decode($response->getBody(), true);

        if(!empty($responseData['formats'])) {
            foreach($responseData['formats'] as $res) {
                $data[] = $res['ext'];
            }

            sort($data);
        }

        return $data;
    }

    public function info($taskId): ?array
    {
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" .
                            "Authorization: Bearer $this->apiKey\r\n",
            ],
        ];
        $context    = stream_context_create($options);
        $result     = file_get_contents($this->baseUrl . 'process/tasks/' . $taskId , false, $context);

        if($result === FALSE)
            return ['status' => '400', 'message' => 'Export failed'];

        return json_decode($result, true);
    }

    public function process($url, $name, $input, $output): ?array
    {
        $data   = [
            'tag'   => "conversion",
            'tasks' => [
                'import'    => [
                    'operation' => "import/url",
                    'url'       => $url,
                    'filename'  => $name,
                ],
                'convert'   => [
                    'operation'     => "convert",
                    'input'         => "import",
                    'output_format' =>  $output
                ]
            ]
        ];
        $options    = [
            'http' => [
                'header'    => "Content-Type: application/json\r\n" .
                                "Accept: application/json\r\n" .
                                "Authorization: Bearer $this->apiKey\r\n",
                'method'    => 'POST',
                'content'   => json_encode($data),
            ],
        ];
        $context    = stream_context_create($options);
        $result     = file_get_contents($this->baseUrl . 'process/jobs' , false, $context);

        if($result === FALSE)
            return ['status' => '400', 'message' => 'Conversion failed'];

        return json_decode($result, true);
    }

    public function download($tasks, $name = "Convy"): ?array
    {
        $data       = [
            'input'                     => $tasks,
            'filename'                  => $name,
            'archive_multiple_files'    => true
        ];
        $options    = [
            'http' => [
                'header'    => "Content-Type: application/json\r\n" .
                                "Accept: application/json\r\n" .
                                "Authorization: Bearer $this->apiKey\r\n",
                'method'    => 'POST',
                'content'   => json_encode($data),
            ],
        ];
        $context    = stream_context_create($options);
        $result     = file_get_contents($this->baseUrl . 'process/export/url' , false, $context);

        if($result === FALSE)
            return ['status' => '400', 'message' => 'Export failed'];

        return json_decode($result, true);
    }
}