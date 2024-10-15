<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Spatie\Multitenancy\Contracts\IsTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\ImplementsTenant;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;

class Tenant extends Model implements IsTenant
{
    use HasFactory;
    use UsesLandlordConnection;
    use ImplementsTenant;

    protected $table = 'tenants';

    protected $fillable = ['name', 'domain', 'database'];

    protected static function booted()
    {
        static::creating(fn(Tenant $model) => $model->createDatabase());
    }

    public function createDatabase()
    {
        $databaseName = $this->database;
        $tenantId = $this->id;
        DB::statement("CREATE DATABASE IF NOT EXISTS `$databaseName`");
        Artisan::call("tenants:artisan --tenant=$tenantId 'migrate --database=tenant'");
    }
}
