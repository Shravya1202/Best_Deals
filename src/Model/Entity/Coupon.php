<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coupon Entity
 *
 * @property int $coupon_id
 * @property int|null $deal_id
 * @property string $coupon_code
 * @property string|null $coupon_description
 * @property \Cake\I18n\FrozenDate|null $coupon_expiry_date
 *
 * @property \App\Model\Entity\Deal $deal
 */
class Coupon extends Entity
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
        'deal_id' => true,
        'coupon_code' => true,
        'coupon_description' => true,
        'coupon_expiry_date' => true,
        'deal' => true,
    ];
}
