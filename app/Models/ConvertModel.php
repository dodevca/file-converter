<?php

namespace App\Models;

use CodeIgniter\Model;
use \ConvertApi\ConvertApi;

class ConvertModel extends Model
{
    private $apiKey     = 'api_production_44978a7b40a64b6caff95a7617a9a73b7ec029f38f0c86e6a0d5dbc53fa5c008.66453c39fd110c63bdd75a8f.66453c64fd110c63bdd75ae2';
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

    public function option($input)
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
}