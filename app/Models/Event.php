<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

# Fazendo ligação com o banco de dados, assim o Controller vai chamar esse model para conectar as informações, que o model resgatou do banco, com as views
class Event extends Model
{
    use HasFactory;
}