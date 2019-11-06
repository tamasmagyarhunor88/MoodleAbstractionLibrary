<?php

namespace Avado\MoodleAbstractionLibrary\Entities;

/**
 * Class ForumPost
 *
 * @package Avado\MoodleAbstractionLibrary\Entities
 */
class ForumPost extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'forum_posts';

    /**
     * Function name changed from 'discussion()' to avoid conflict with field name
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discussion()
    {
        return $this->belongsTo(ForumDiscussion::class, 'discussion', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'userid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function forum()
    {
        return $this->hasOneThrough(Forum::class, ForumDiscussion::class,  'id', 'id', 'forum', 'discussion');
    }
}
