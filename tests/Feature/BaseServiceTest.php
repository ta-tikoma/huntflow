<?php

declare(strict_types=1);

namespace tests\Feature;

use Huntflow\HuntflowAPI;
use Huntflow\HuntflowClient;
use Huntflow\Responses\Base\Account;
use Huntflow\Responses\Base\Accounts;
use Huntflow\Responses\Base\Me;
use PHPUnit\Framework\MockObject\MockObject;
use tests\TestCase;

final class BaseServiceTest extends TestCase
{
    public function testMe(): void
    {
        /** @var HuntflowClient|MockObject $client */
        $client = $this->getMockBuilder(HuntflowClient::class)
            ->setConstructorArgs(['', '', ''])
            ->setMethods(['request'])
            ->getMock();

        $client
            ->method('request')
            ->willReturn(
                [
                    'id'       => 3123123,
                    'name'     => 'Иванов Иван',
                    'position' => 'HRD',
                    'email'    => 'hello@huntflow.ru',
                    'phone'    => '84956478221',
                    'locale'   => 'ru_RU',
                ]
            );

        $api = new HuntflowAPI($client);

        $this->assertInstanceOf(Me::class, $api->base()->me());
    }

    public function testAccounts(): void
    {
        /** @var HuntflowClient|MockObject $client */
        $client = $this->getMockBuilder(HuntflowClient::class)
            ->setConstructorArgs(['', '', ''])
            ->setMethods(['request'])
            ->getMock();

        $client
            ->method('request')
            ->willReturn(
                [
                    'items' => [
                        [
                            'id'          => 123,
                            'name'        => 'ООО Теллур',
                            'nick'        => 'tellur',
                            'member_type' => 'owner'
                        ],
                        [
                            'id'          => 125,
                            'name'        => 'Эйчар системы',
                            'nick'        => 'hr-systems',
                            'member_type' => 'manager'
                        ]
                    ]
                ]
            );

        $api = new HuntflowAPI($client);

        $accounts = $api->base()->accounts();
        $this->assertInstanceOf(Accounts::class, $accounts);
        $this->assertGreaterThan(0, count($accounts->items));
        $this->assertInstanceOf(Account::class, $accounts->items[0]);
    }
}
