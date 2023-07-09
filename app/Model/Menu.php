<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property string $title 
 * @property string $url 
 * @property string $query 
 * @property int $weight 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class Menu extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'menu';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'weight' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
