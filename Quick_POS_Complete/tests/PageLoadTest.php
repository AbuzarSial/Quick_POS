<?php

declare(strict_types=1);

namespace QuickPOSTests;

use PHPUnit\Framework\TestCase;

final class PageLoadTest extends TestCase
{
    public function testIndexPageFileExists(): void
    {
        self::assertFileExists(__DIR__ . '/../index.php');
    }

    public function testIndexPageContainsRequiredSections(): void
    {
        $content = (string) file_get_contents(__DIR__ . '/../index.php');

        self::assertStringContainsString('id="home"', $content);
        self::assertStringContainsString('id="features"', $content);
        self::assertStringContainsString('id="pricing"', $content);
        self::assertStringContainsString('id="contact"', $content);
    }

    public function testThankYouPageFileExists(): void
    {
        self::assertFileExists(__DIR__ . '/../thank_you.php');
    }
}
