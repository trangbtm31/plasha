<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationMember extends Model
{
    protected $table = 'conversation_member';

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
