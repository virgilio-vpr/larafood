<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Pemissions not linked with this profile
     */

     public function permissionsAvailable($filter = null)
     {
        $permissions = Permission::whereNotIn('permissions.id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function($queryFilter) use($filter){
            if($filter)
            $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();
         return $permissions;
     }
}
