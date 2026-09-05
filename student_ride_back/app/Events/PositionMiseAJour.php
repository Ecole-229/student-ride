<?php

namespace App\Events;

use App\Models\Position;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PositionMiseAJour
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
   public function __construct(public Position $position) {}

    public function broadcastOn(): array
    {
        // Canal privé propre à ce trajet : seuls les gens autorisés
        // sur ce canal reçoivent l'événement
        return [new PrivateChannel('trajet.' . $this->position->trajet_id)];
    }

    public function broadcastWith(): array
    {
        return [
            'latitude' => $this->position->latitude,
            'longitude' => $this->position->longitude,
            'horodatage' => $this->position->horodatage,
        ];
    }

    public function broadcastAs(): string
    {
        return 'position.maj';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
   
}
