<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversation';

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function conversation_member()
    {
        return $this->hasMany(ConversationMember::class);
    }
}
