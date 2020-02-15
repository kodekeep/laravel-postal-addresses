<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Addresses.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\Addresses\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use KodeKeep\Addresses\Models\Address;

trait HasAddresses
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
