<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 17-10-24
 * Time: 上午11:30
 */

namespace Dezsidog\BaiduBos;


use BaiduBce\Services\Bos\BosClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use League\Flysystem\Filesystem;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        Storage::extend('baidu-bos', function (Application $app, array $config) {
            $client = new BosClient([
                'credentials' => array(
                    'accessKeyId' => $config['accessKeyId'],
                    'secretAccessKey' => $config['secretAccessKey'],
                    'sessionToken' => $config['sessionToken'],
                ),
                'endpoint' => $config['endpoint'],
                'stsEndpoint' => $config['stsEndpoint'],
            ]);

            if ($config['protocol'] && $config['domain']) {
                $domain = ($config['protocol'] ? $config['protocol'].'://' : 'http://').$config['domain'];
            }else{
                $domain = '';
            }

            return new Filesystem(new BaiduBosAdapter($client, $config['bucket'],$domain,$config['uri_prefix']));
        });
    }

    public function register()
    {

    }
}