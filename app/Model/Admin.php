<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property string $username 
 * @property string $password 
 * @property string $nickname 
 * @property string $avatar 
 * @property string $email 
 * @property string $salt 
 * @property int $status 
 * @property int $last_login_time 
 * @property string $last_login_ip 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class Admin extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin';

    /**
     * The attributes that are mass assignable.
     */
//    protected array $fillable = [];

    protected array $guarded = [

    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [
        'id' => 'integer', 'status' => 'integer', 'last_login_time' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime',
        "password" => "string",
        "salt" => "string",
        "last_login_ip" => "string",
        "username" => "string",
        "email" => "string",
    ];
}
