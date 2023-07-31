<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cashback Entity
 *
 * @property int $cashback_id
 * @property int|null $deal_id
 * @property string $cashback_percentage
 * @property string|null $cashback_description
 * @property \Cake\I18n\FrozenDate|null $cashback_validity
 *
 * @property \App\Model\Entity\Deal $deal
 */
class Cashback extends Entity
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
        'cashback_percentage' => true,
        'cashback_description' => true,
        'cashback_validity' => true,
        'deal' => true,
    ];
}
