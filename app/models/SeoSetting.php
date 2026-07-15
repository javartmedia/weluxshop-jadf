<?php
namespace App\Models;

use App\Core\Model;

class SeoSetting extends Model {
    protected static string $table = 'seo_settings';
    protected static array $fillable = ['page', 'meta_title', 'meta_description', 'og_image', 'canonical_url'];
}
