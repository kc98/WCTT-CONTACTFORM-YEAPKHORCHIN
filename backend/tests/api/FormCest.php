<?php

use Codeception\Util\HttpCode;
use Faker\Factory;

class SubmitFormCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToSubmitForm(ApiTester $I)
    {
        $faker = Factory::create();
        $input = [
            'name' => $faker->name(),
            'email' => $faker->safeEmail(),
            'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        ];

        $I->haveHttpHeader('accept', 'application/json');
        $I->sendPost('form', $input);
        $I->seeResponseCodeIs(HttpCode::CREATED);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType(
            [
                'name' => 'string',
                'email' => 'string',
                'description' => 'string',
                'created_at' => 'integer',
                'id' => 'integer',
            ]
        );

        $I->seeResponseContainsJson($input);
    }

    public function tryToSubmitFormWithoutEmail(ApiTester $I)
    {
        $faker = Factory::create();
        $input = [
            'name' => $faker->name(),
            'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        ];

        $I->haveHttpHeader('accept', 'application/json');
        $I->sendPost('form', $input);
        $I->seeResponseCodeIs(422);
        $I->seeResponseContainsJson([
            'field' => 'email'
        ]);
        $I->seeResponseIsJson();
    }

    public function tryToSubmitFormWithoutName(ApiTester $I)
    {
        $faker = Factory::create();
        $input = [
            'email' => $faker->safeEmail(),
            'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        ];

        $I->haveHttpHeader('accept', 'application/json');
        $I->sendPost('form', $input);
        $I->seeResponseCodeIs(422);
        $I->seeResponseContainsJson([
            'field' => 'name'
        ]);
        $I->seeResponseIsJson();
    }

    public function tryToSubmitFormWithoutDescription(ApiTester $I)
    {
        $faker = Factory::create();
        $input = [
            'name' => $faker->name(),
            'email' => $faker->safeEmail(),
        ];

        $I->haveHttpHeader('accept', 'application/json');
        $I->sendPost('form', $input);
        $I->seeResponseCodeIs(422);
        $I->seeResponseContainsJson([
            'field' => 'description'
        ]);
        $I->seeResponseIsJson();
    }

    public function getAllForms(ApiTester $I)
    {
        $I->sendGet('form');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseIsValidOnJsonSchemaString('{"type": "array"}');
        $validResponseJsonSchema = json_encode(
            [
                'properties' => [
                    'id' => ['type' => 'integer'],
                    'name' => ['type' => 'string'],
                    'email' => ['type' => 'string'],
                    'desription' => ['type' => 'string'],
                    'created_at' => ['type' => 'integer'],
                ]
            ]
        );

        $I->seeResponseIsValidOnJsonSchemaString($validResponseJsonSchema);
    }

    public function getForm(ApiTester $I)
    {
        $I->sendGet('form/1');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseIsValidOnJsonSchemaString('{"type": "object"}');
        $validResponseJsonSchema = json_encode(
            [
                'properties' => [
                    'id' => ['type' => 'integer'],
                    'name' => ['type' => 'string'],
                    'email' => ['type' => 'string'],
                    'desription' => ['type' => 'string'],
                    'created_at' => ['type' => 'integer'],
                ]
            ]
        );

        $I->seeResponseIsValidOnJsonSchemaString($validResponseJsonSchema);
    }
}
