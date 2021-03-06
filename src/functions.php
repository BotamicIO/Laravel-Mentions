<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Mentions.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Artisanry\Mentions\MentionBuilder;

if (!function_exists('mention')) {
    /**
     * @return \Illuminate\Foundation\Application|mixed
     */
    function mention(): MentionBuilder
    {
        return app('mentionBuilder');
    }
}
