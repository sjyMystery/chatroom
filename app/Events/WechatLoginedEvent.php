<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 17-8-19
 * Time: 下午3:00
 */
namespace App\Events;


use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Event;

class WechatLoginedEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $token;
    protected $channel;

    /**
     * Create a new event instance.
     *
     * @param  string $token
     * @param  string $channel
     * @return void
     */
    public function __construct($token, $channel)
    {
        $this->token = $token;
        $this->channel = $channel;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [$this->channel];
    }

    /**
     * Get the name the event should be broadcast on.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'wechat.login';
    }
}
