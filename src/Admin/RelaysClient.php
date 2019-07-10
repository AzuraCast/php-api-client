<?php
declare(strict_types=1);

namespace AzuraCast\Api\Admin;

use AzuraCast\Api\AbstractClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class RelaysClient extends AbstractClient
{
    /**
     * @return Dto\AdminRelaysDto[]
     */
    public function list(): array
    {
        $relays = $this->request('GET', 'admin/relays');

        $return = [];
        foreach ($relays as $relay) {
            $return[] = Dto\AdminRelaysDto::fromArray($relay);
        }

        return $return;
    }
}
