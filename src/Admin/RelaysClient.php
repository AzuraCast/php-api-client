<?php
declare(strict_types=1);

namespace AzuraCast\Api\Admin;

use AzuraCast\Api\AbstractClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class RelaysClient extends AbstractClient
{
    /**
     * @return Dto\AdminRelayDto[]
     */
    public function list(): array
    {
        $relays = $this->request('GET', 'admin/relays');

        $return = [];
        foreach ($relays as $relay) {
            $return[] = Dto\AdminRelayDto::fromArray($relay);
        }

        return $return;
    }

    /**
     * @param Dto\AdminRelayUpdateDto $dto
     */
    public function update(Dto\AdminRelayUpdateDto $dto): void
    {
        $this->request('POST', 'admin/relays', [
            'json' => $dto,
        ]);
    }

}
