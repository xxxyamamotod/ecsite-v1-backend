<?php

declare(strict_types=1);

namespace App\Actions\Customers\Register;

use App\Actions\Customers\Register\ValidationResult;

/**
 * App\Actions\Customers\Registerのバリデータ
 */
class Validator
{
    /**
     * バリデーションの結果を返してくれる
     *
     * @param boolean $isPost
     * @return ValidationResult
     */
    public static function result(bool $isPost): ValidationResult
    {
        if (!$isPost) {
            return ValidationResult::inValid('不正なリクエストです。');
        }

        return ValidationResult::valid('success');
    }
}
