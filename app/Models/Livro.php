<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $primaryKey = 'idlivro';
    protected $fillable = ['titulo', 'isbn', 'ano_publicacao','descricao', 
                          'paginas', 'idautor','idcategoria'];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'idautor', 'idautor');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria', 'idcategoria');
    }
}