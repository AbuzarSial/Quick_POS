<?php

declare(strict_types=1);

namespace QuickPOSTests;

use PHPUnit\Framework\TestCase;
use QuickPOS\ContactValidator;

final class ContactValidationTest extends TestCase
{
    private ContactValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new ContactValidator();
    }

    public function testEmptyNameFails(): void
    {
        $errors = $this->validator->validate([
            'name' => '',
            'email' => 'ali@example.com',
            'message' => 'I want to try QuickPOS.',
        ]);

        self::assertArrayHasKey('name', $errors);
    }

    public function testEmptyEmailFails(): void
    {
        $errors = $this->validator->validate([
            'name' => 'Ali Khan',
            'email' => '',
            'message' => 'I want to try QuickPOS.',
        ]);

        self::assertArrayHasKey('email', $errors);
    }

    public function testInvalidEmailFails(): void
    {
        $errors = $this->validator->validate([
            'name' => 'Ali Khan',
            'email' => 'wrong-email',
            'message' => 'I want to try QuickPOS.',
        ]);

        self::assertArrayHasKey('email', $errors);
    }

    public function testEmptyMessageFails(): void
    {
        $errors = $this->validator->validate([
            'name' => 'Ali Khan',
            'email' => 'ali@example.com',
            'message' => '',
        ]);

        self::assertArrayHasKey('message', $errors);
    }

    public function testShortMessageFails(): void
    {
        $errors = $this->validator->validate([
            'name' => 'Ali Khan',
            'email' => 'ali@example.com',
            'message' => 'Hi',
        ]);

        self::assertArrayHasKey('message', $errors);
    }

    public function testValidContactFormDataPasses(): void
    {
        $errors = $this->validator->validate([
            'name' => 'Ali Khan',
            'email' => 'ali@example.com',
            'message' => 'I want to know more about QuickPOS for my store.',
        ]);

        self::assertSame([], $errors);
    }
}
