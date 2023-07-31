<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DealsFixture
 */
class DealsFixture extends TestFixture
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
                'deal_id' => 1,
                'category_id' => 1,
                'store_id' => 1,
            ],
        ];
        parent::init();
    }
}
