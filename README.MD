# laravel-baidu-bos

this is a package for laravel storage by baidu bos sdk

## install

```bash
composer require dezsidog/laravel-baidu-bos
```

## Configuration

Edit `config\filesystems.php`:

Add bos disk

```php
	'disks' => [

		'local' => [
			'driver' => 'local',
			'root'   => storage_path().'/app',
		],

		's3' => [
			'driver' => 's3',
			'key'    => 'your-key',
			'secret' => 'your-secret',
			'region' => 'your-region',
			'bucket' => 'your-bucket',
		],

		'rackspace' => [
			'driver'    => 'rackspace',
			'username'  => 'your-username',
			'key'       => 'your-key',
			'container' => 'your-container',
			'endpoint'  => 'https://identity.api.rackspacecloud.com/v2.0/',
			'region'    => 'IAD',
			'url_type'  => 'publicURL'
		],
		'baidu-bos' => [
            'driver' => 'baidu-bos',
            'accessKeyId' => 'your-ak',
            'secretAccessKey' => 'your-sk',
            'sessionToken' => 'your-token',
            'endpoint' => 'your-endpoint',
            'stsEndpoint' => 'your-sts-endpoint',
            'bucket' => 'amiedu',
		],
	],
```

## usage
[laravel document](https://laravel.com/docs/5.5/filesystem#custom-filesystems)
