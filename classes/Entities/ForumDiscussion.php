<?php

namespace Avado\MoodleAbstractionLibrary\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ForumDiscussion
 *
 * @package Avado\MoodleAbstractionLibrary\Entities
 */
class ForumDiscussion extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'forum_discussions';

    /**
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(ForumPost::class, 'discussion', 'id');
    }

    /**
     * Function name changed from 'forum()' to avoid conflict with field name
     *
     * @return BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum', 'id');
    }
}
