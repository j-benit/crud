<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
/**
 * Class Correo
 *
 * @property $id
 * @property $categorias_id
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Correo extends Model
{
    
  
  
    protected $table = 'correo';
      // Resto del código del modelo
 

    static $rules = [
		'categorias_id' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categorias_id','correo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categorias_id');
    }
    
    public function links()
    {
        $paginator = new Paginator($this, $this->perPage);
        return $paginator->links();
    }

}
