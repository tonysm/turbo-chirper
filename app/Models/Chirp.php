<?php

namespace App\Models;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\TurboLaravel\Models\Broadcasts;

class Chirp extends Model
{
    use HasFactory;
    use Broadcasts;

    protected $broadcasts = [
        'insertsBy' => 'prepend',
    ];

    protected $fillable = [
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function broadcastsTo()
    {
        return [
            new PrivateChannel('chirps'),
        ];
    }
}
