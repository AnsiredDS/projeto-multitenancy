<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Contracts\IsTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\ImplementsTenant;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;

class Client extends Model implements IsTenant
{
    use HasFactory;
    use UsesLandlordConnection;
    use ImplementsTenant;

    protected $table = 'clients';

    protected $fillable = ['name', 'domain', 'database'];

    protected static function booted()
    {
        static::creating(fn(Client $model) => $model->createDatabase());
    }

    public function createDatabase()
    {
        $databaseName = $this->database;
        DB::statement("CREATE DATABASE IF NOT EXISTS `$databaseName`");
    }
}
