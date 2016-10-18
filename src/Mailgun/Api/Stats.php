<?php

namespace Mailgun\Api;

use Mailgun\Assert;
use Mailgun\Resource\Api\Stats\AllResponse;
use Mailgun\Resource\Api\Stats\TotalResponse;

/**
 * {@link https://documentation.mailgun.com/api-stats.html}.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class Stats extends AbstractApi
{
    public function total($domain, array $params = [])
    {
        Assert::stringNotEmpty($domain);

        $response = $this->get(sprintf('/v3/%s/stats/total', rawurlencode($domain)), $params);

        return $this->serializer->deserialze($response, TotalResponse::class);
    }

    public function all($domain, array $params = [])
    {
        Assert::stringNotEmpty($domain);

        $response = $this->get(sprintf('/v3/%s/stats', rawurlencode($domain)), $params);

        return $this->serializer->deserialze($response, AllResponse::class);

    }
}
