<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $table = 'ebooks';

    protected $fisilable = ['category_id', 'title_ebook', 'image', 'description', 'link_download', 'hastaq'];

    public function category()
    {
        return $this->belongsTo(EbookCategory::class, 'category_id', 'id');
    }
}
