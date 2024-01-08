<?php

declare(strict_types=1);

namespace Dotfile\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Case\Tag;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseAddTagsTest extends TestCase
{
    public function testCaseCreateWithMinimumValidData(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_add_tags_with_minimal_data_response.json')),
        ]));

        $caseAddTags = $client->case->addTags('39cbd6d5-4da5-4d94-ae71-84895c5e552a', ['A faire']);

        //var_dump($caseAddTags);
        $this->assertIsArray($caseAddTags);
        $this->assertEquals([
            'id' => 'ea5c5935-2ec8-4519-a526-7ab25c71ac4e',
            'label' => 'A faire',
        ], current($caseAddTags));
    }
}
