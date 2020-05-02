<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleitor extends Model
{
	protected $fillable = ['nome', 'telefone','localidade', 'endereco'];
}