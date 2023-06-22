<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocument extends Model
{
    use HasFactory;

    protected $table = 'doc_documents';

    public function typeDocument()
    {
        return $this->belongsTo(TipTipoDoc::class, 'doc_id_type', 'id');
    }

    public function process()
    {
        return $this->belongsTo(ProProcess::class, 'doc_id_process', 'id');
    }
}
