<?php

declare(strict_types=1);

namespace tests\Feature;

use Huntflow\HuntflowAPI;
use Huntflow\Ids\AccountId;
use Huntflow\Ids\VacancyId;
use Huntflow\Requests\Vacancies\EditVacancy as EditVacancyRequest;
use Huntflow\Requests\Vacancies\Quotas\Quotas as QuotasRequest;
use Huntflow\Requests\Vacancies\Vacancies as VacanciesRequest;
use Huntflow\Responses\Status;
use Huntflow\Responses\Vacancies\EditVacancy as EditVacancyResponse;
use Huntflow\Responses\Vacancies\Quotas\Quotas as QuotasResponse;
use Huntflow\Responses\Vacancies\Vacancies as VacanciesResponse;
use Huntflow\Responses\Vacancies\Vacancy;
use tests\TestCase;

final class VacanciesServiceTest extends TestCase
{
    public function testCreate(): void
    {
        $client = $this->getClientMock();
        $client->method('request')
            ->willReturn(
                [
                    'id' => 1,
                    'created' => '2017-04-10T21:34:01+03:00'
                ]
            );

        $api = new HuntflowAPI($client);

        $vacancy = new EditVacancyRequest();
        $vacancy->position = 'Manufacturing Engineer';

        $response = $api->vacancies(new AccountId(1))->create(
            $vacancy
        );

        $this->assertInstanceOf(
            EditVacancyResponse::class,
            $response
        );
    }

    public function testUpdate(): void
    {
        $client = $this->getClientMock();
        $client->method('request')
            ->willReturn(
                [
                    'id' => 1,
                    'created' => '2017-04-10T21:34:01+03:00'
                ]
            );

        $api = new HuntflowAPI($client);

        $vacancy = new EditVacancyRequest();
        $vacancy->position = 'Manufacturing Engineer';

        $response = $api->vacancies(new AccountId(1))->update(
            new VacancyId(1),
            $vacancy
        );

        $this->assertInstanceOf(
            EditVacancyResponse::class,
            $response
        );
    }

    public function testDelete(): void
    {
        $client = $this->getClientMock();
        $client->method('request')
            ->willReturn(
                [
                    'status' => true
                ]
            );

        $api = new HuntflowAPI($client);

        $response = $api->vacancies(new AccountId(1))->delete(
            new VacancyId(1)
        );

        $this->assertInstanceOf(
            Status::class,
            $response
        );
    }

    public function testVacancy(): void
    {
        $client = $this->getClientMock();
        $client->method('request')
            ->willReturn(
                [
                    'id'                 => 4531,
                    'position'           => '???????????????? ???? ????????????????',
                    'company'            => '?????????? ????????????',
                    'money'              => '30 000 + 3% ???? ????????????',
                    'deadline'           => '2017-04-27',
                    'applicants_to_hire' => 1,
                    'created'            => '2017-03-22T18:16:27+03:00',
                    'priority'           => 0,
                    'hidden'             => false,
                    'state'              => 'OPEN',
                    'body'               => '<p>???????? ?? ??????, ???????? ???? <strong>????????</strong></p>',
                    'requirements'       => '<p>?????? ?? ???????? ?????? <strong>??????????????</strong></p>',
                    'conditions'         => '<p>???????????? ?? ???????? ?? ?????????? ???????? <strong>????????</strong></p>',
                    'files'              => [
                        [
                            'id'           => 15808,
                            'name'         => '???????????? ???????????? 2017-04-10 ?? 11.00.13.png',
                            'content_type' => 'image/png',
                            'url'          => 'https://store.huntflow.ru/uploads/f/f/h/ffhov94xuqytbl16u8b9l3oeewdjpyoc.png'
                        ]
                    ]
                ]
            );

        $api = new HuntflowAPI($client);

        $response = $api->vacancies(new AccountId(1))->vacancy(
            new VacancyId(1)
        );

        $this->assertInstanceOf(
            Vacancy::class,
            $response
        );
    }

    public function testVacancies(): void
    {
        $client = $this->getClientMock();
        $client->method('request')
            ->willReturn(
                [
                    "items" => [
                        [
                            "id"                 => 4531,
                            "position"           => "???????????????? ???? ????????????????",
                            "company"            => "?????????? ????????????",
                            "money"              => "30 000 + 3% ???? ????????????",
                            "deadline"           => "2017-04-27",
                            "applicants_to_hire" => 1,
                            "created"            => "2017-03-22T18:16:27+03:00",
                            "priority"           => 0,
                            "hidden"             => false,
                            "state"              => "OPEN"
                        ],
                        [
                            "id"                 => 4530,
                            "position"           => "?????????????????????? Python",
                            "company"            => "?????????? ????????????????????",
                            "money"              => "80 000 ??????",
                            "deadline"           => null,
                            "applicants_to_hire" => 1,
                            "created"            => "2017-03-22T18:16:27+03:00",
                            "priority"           => 0,
                            "hidden"             => false,
                            "state"              => "CLOSED"
                        ]
                    ],
                    "total" => 1,
                    "page" => 1,
                    "count" => 30
                ]
            );

        $api = new HuntflowAPI($client);

        $response = $api->vacancies(new AccountId(1))->vacancies(
            new VacanciesRequest(10, 1)
        );

        $this->assertInstanceOf(
            VacanciesResponse::class,
            $response
        );
    }

    public function testQuotas(): void
    {
        $vacancyId = 101;

        $client = $this->getClientMock();
        $client->method('request')
            ->willReturn(
                [
                    (string) $vacancyId =>  [
                        "count" => 30,
                        "page"  => 1,
                        "total" => 1,
                        "items" =>  [
                            [
                                "already_hired"      => 1,
                                "applicants_to_hire" => 2,
                                "closed"             => null,
                                "created"            => "2020-02-03 19:47:59",
                                "deadline"           => "2020-03-04",
                                "id"                 => 64,
                                "vacancy_request"    => null,
                                "account_info"       => [
                                    "email" => "email ???????????????????????? ???????????????????? ??????????",
                                    "id"    => 135,
                                    "name"  => "?????? ???????????????????????? ???????????????????? ??????????"
                                ]
                            ]
                        ],
                    ]
                ]
            );

        $api = new HuntflowAPI($client);

        $response = $api->vacancies(new AccountId(1))->quotas(
            new VacancyId($vacancyId),
            new QuotasRequest(10, 1)
        );

        $this->assertInstanceOf(
            QuotasResponse::class,
            $response
        );
    }
}
