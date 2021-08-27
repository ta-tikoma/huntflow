<?php

declare(strict_types=1);

namespace tests;

use Huntflow\HuntflowClient;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @return MockObject|HuntflowClient
     */
    protected function getClientMock()
    {
        $client = $this->getMockBuilder(HuntflowClient::class)
            ->setConstructorArgs(['', '', ''])
            ->setMethods(['request'])
            ->getMock();

        return $client;
    }
}
