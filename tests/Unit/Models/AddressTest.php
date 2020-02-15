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

namespace KodeKeep\Addresses\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use KodeKeep\Addresses\Tests\TestCase;
use KodeKeep\Addresses\Tests\Unit\ClassThatHasAddresses;

/**
 * @covers \KodeKeep\Addresses\Models\Address
 */
class AddressTest extends TestCase
{
    /** @test */
    public function morphs_to_an_addressable(): void
    {
        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', ['--database' => 'testbench'])->run();

        $class = ClassThatHasAddresses::create([
            'name'     => 'John Doe',
            'email'    => 'john@doe.com',
            'password' => 'password',
        ])->addresses()->create([
            'type'           => 'billing',
            'name'           => 'name',
            'address_line_1' => 'address_line_1',
            'address_line_2' => 'address_line_2',
            'city'           => 'city',
            'state'          => 'state',
            'zip'            => 'zip',
            'country'        => 'country',
        ]);

        $this->assertInstanceOf(MorphTo::class, $class->addressable());
    }
}
