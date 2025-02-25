<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Location extends Model{
    use HasFactory;
    protected $table = "location";
    protected $fillable = [
        'country',
        'district',
        'village',
        'image_url'
    ] ;

    public function scopeFilter($query, array $filter){
        if(isset($filter['country'])){
            $query->where('country', 'like','%'.$filter['country'].'%');
        }
    }
}
?>