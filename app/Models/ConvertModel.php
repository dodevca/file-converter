<?php

namespace App\Models;

use CodeIgniter\Model;
use \ConvertApi\ConvertApi;

class ConvertModel extends Model
{
    private $apiKey     = 'api_production_3194212f7967fb10f9992a4c68ca5d81ce4e00d79558aa5e1cbd8a7b68461a87.66453c39fd110c63bdd75a8f.66714753ec714decadba825f';
    private $baseUrl    = 'https://api.freeconvert.com/v1/';



    public function list($category = null): ?array
    {
        // $curl       = \Config\Services::curlrequest();
        // $response   = $curl->request('GET', "{$this->baseUrl}query/formats?apikey={$this->apiKey}&input_format=*");
        // $data       = null;

        // if($response->getStatusCode() != 200)
        //     return null;

        // $responseData = json_decode($response->getBody(), true);
        
        // foreach($responseData['formats'] as $res) {
        //     $data[] = $res['ext'];
        // }

        // return $data;
        
        $response   = null;
        $data       = [
            'image'         => ['.bmp', '.gif', '.heic', '.jpeg', '.jpg', '.png', '.tif', '.tiff', '.webp'],
            'document'      => ['.csv', '.doc', '.docm', '.docx', '.dot', '.dotx', '.epub', '.htm', '.html', '.odp', '.ods', '.odt', '.pages', '.pdf', '.pot', '.potx', '.pps', '.ppsx', '.ppt', '.pptm', '.pptx', '.ps', '.psd', '.ptx', '.pub', '.rtf', '.txt', '.wpd', '.wps', '.xps', '.xml'],
            'audio'         => ['.aac', '.aif', '.aifc', '.aiff', '.amr', '.ape', '.flac', '.m4a', '.m4b', '.m4p', '.m4r', '.mid', '.midi', '.mp1', '.mp2', '.mp3', '.oga', '.ogg', '.opus', '.wav', '.wave', '.wma'],
            'video'         => ['.3g2', '.3ga', '.3gp', '.3gpp', '.avi', '.avif', '.divx', '.flv', '.m1v', '.m2ts', '.m4v', '.mkv', '.mov', '.mp4', '.mpeg', '.mpg', '.mpv', '.mts', '.ogv', '.qt', '.rm', '.rmvb', '.ts', '.vob', '.webm', '.wmv', '.xvid'],
            'compressed'    => ['.7z', '.bz2', '.gz', '.rar', '.tar', '.tgz', '.zip'],
            'vector'        => ['.ai', '.cdr', '.cgm', '.dxf', '.emf', '.eps', '.pdf', '.ps', '.psb', '.svg', '.svgz', '.wmf'],
            'raw'           => ['.arw', '.cr2', '.cr3', '.crw', '.dcr', '.dng', '.nef', '.nrw', '.orf', '.raf', '.raw', '.rw2', '.rwl', '.srf', '.sr2', '.srw', '.x3f'],
            'ebook'         => ['.azw', '.azw3', '.azw4', '.fb2', '.mobi'],
            'archive'       => ['.cbz', '.cbr', '.chm', '.epub']
        ];

        if($category == null) 
            $data = array_keys($data);
        else
            $data = $data[$category];

        return $data;
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
        $data = [
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
        $data = [
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