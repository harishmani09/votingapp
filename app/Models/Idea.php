<?php

namespace App\Models;

use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory;
    protected $guarded = [];
    const PAGINATION_COUNT=10;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function getStatusClasses()
    {

        $allStatuses = [
            'Open' => 'bg-gray-200',
            'In Progress' => 'bg-yellow ',
            'Considering' => 'bg-purple ',
            'Implemented' => 'bg-green ',
            'Closed' => 'bg-red '
        ];
        return $allStatuses[$this->status->name];

        // if($this->status->name === 'Open'){
        //     return "bg-gray-200";
        // } elseif ($this->status->name === 'In Progress'){
        //     return "bg-yellow";
        // } elseif($this->status->name === 'Considering'){
        //     return "bg-green";
        // }elseif($this->status->name === 'Implemented'){
        //     return "bg-red";}
        // elseif($this->status->name === 'Closed'){
        //         return "bg-red";
        //     }
        //     return 'bg-gray-200';
    }
}
