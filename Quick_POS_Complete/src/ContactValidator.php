<?php

declare(strict_types=1);

namespace QuickPOS;

final class ContactValidator
{
    /**
     * @param array{name?: string, email?: string, message?: string} $data
     * @return array<string, string>
     */
    public function validate(array $data): array
    {
        $errors = [];

        $name = trim((string) ($data['name'] ?? ''));
        $email = trim((string) ($data['email'] ?? ''));
        $message = trim((string) ($data['message'] ?? ''));

        if ($name === '') {
            $errors['name'] = 'Name is required.';
        } elseif (strlen($name) < 2) {
            $errors['name'] = 'Name must be at least 2 characters.';
        }

        if ($email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if ($message === '') {
            $errors['message'] = 'Message is required.';
        } elseif (strlen($message) < 10) {
            $errors['message'] = 'Message must be at least 10 characters.';
        }

        return $errors;
    }

    /**
     * @param array{name?: string, email?: string, message?: string} $data
     * @return array{name: string, email: string, message: string}
     */
    public function sanitize(array $data): array
    {
        return [
            'name' => htmlspecialchars(trim((string) ($data['name'] ?? '')), ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars(trim((string) ($data['email'] ?? '')), ENT_QUOTES, 'UTF-8'),
            'message' => htmlspecialchars(trim((string) ($data['message'] ?? '')), ENT_QUOTES, 'UTF-8'),
        ];
    }
}
