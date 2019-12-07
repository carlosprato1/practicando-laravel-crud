<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','url','description'];
    //  protected $guarded = []; user este mejor y ltrar con validate en controlador.
  //  public function getRouteKeyName(){return 'url';  }?? // cambia el primarykey por el definido

}
