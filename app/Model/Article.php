<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property string $title 
 * @property string $describe 
 * @property string $image 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class Article extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'article';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer',"category_id" => "integer", 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    // 关联表
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    // 关联表
    public function content()
    {
        return $this->hasOne(Content::class, 'id', 'id');
    }

}
