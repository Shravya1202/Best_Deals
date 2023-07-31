<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoresFixture
 */
class StoresFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'store_id' => 1,
                'store_name' => 'Lorem ipsum dolor sit amet',
                'store_logo' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
