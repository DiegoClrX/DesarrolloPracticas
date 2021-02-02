<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    //Esto seria en el caso del que modelo no se llame igual que la tabla en plural (Para ver con quien se esta asociando)
    protected $table = 'empleados';
}
