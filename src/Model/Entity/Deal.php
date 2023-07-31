<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deal Entity
 *
 * @property int $deal_id
 * @property int|null $category_id
 * @property int|null $store_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Store $store
 */
class Deal extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'category_id' => true,
        'store_id' => true,
        'category' => true,
        'store' => true,
        'coupon' => true,
        'cashback' => true,
        'cashback_id' => true,
        'cashback_description' => true
    ];
}