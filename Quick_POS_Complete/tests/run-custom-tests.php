<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/ContactValidator.php';

use QuickPOS\ContactValidator;

$validator = new ContactValidator();
$tests = [
    'Empty name fails' => fn (): bool => isset($validator->validate([
        'name' => '',
        'email' => 'ali@example.com',
        'message' => 'I want to try QuickPOS.',
    ])['name']),
    'Empty email fails' => fn (): bool => isset($validator->validate([
        'name' => 'Ali Khan',
        'email' => '',
        'message' => 'I want to try QuickPOS.',
    ])['email']),
    'Invalid email fails' => fn (): bool => isset($validator->validate([
        'name' => 'Ali Khan',
        'email' => 'wrong-email',
        'message' => 'I want to try QuickPOS.',
    ])['email']),
    'Empty message fails' => fn (): bool => isset($validator->validate([
        'name' => 'Ali Khan',
        'email' => 'ali@example.com',
        'message' => '',
    ])['message']),
    'Valid data passes' => fn (): bool => $validator->validate([
        'name' => 'Ali Khan',
        'email' => 'ali@example.com',
        'message' => 'I want to know more about QuickPOS for my store.',
    ]) === [],
    'Index page exists' => fn (): bool => file_exists(__DIR__ . '/../index.php'),
];

$failed = 0;

foreach ($tests as $name => $test) {
    $passed = $test();
    echo ($passed ? '[PASS] ' : '[FAIL] ') . $name . PHP_EOL;

    if (!$passed) {
        $failed++;
    }
}

exit($failed > 0 ? 1 : 0);
