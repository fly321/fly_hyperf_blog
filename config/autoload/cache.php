<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'default' => [
//        'driver' => Hyperf\Cache\Driver\RedisDriver::class,
        'driver' => Hyperf\Cache\Driver\FileSystemDriver::class,
        'packer' => Hyperf\Codec\Packer\PhpSerializerPacker::class,
        'prefix' => 'c:',
        'ttl' => 3600,
        'path' => BASE_PATH . '/runtime/cache/',
    ],
];
