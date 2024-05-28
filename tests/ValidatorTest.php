<?php

use PHPUnit\Framework\TestCase;
use App\Validator;
use PHPUnit\Framework\Attributes\DataProvider;

class ValidatorTest extends TestCase {
    
    #[DataProvider('emailProvider')]
    public function testIsValidEmail($email, $expected) {
        $validator = new Validator();
        $this->assertEquals($expected, $validator->isValidEmail($email));
    }

    public static function emailProvider() {
        return [
            ["test@example.com", true],
            ["invalid-email", false],
            ["another@test.co", true],
            ["wrong@.com", false]
        ];
    }
}
