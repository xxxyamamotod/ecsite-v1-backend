<?php

declare(strict_types=1);

namespace App\Actions\Customers\Register;

use App\Actions\Customers\Register\ValidationResult;
use App\Actions\Customers\Register\IValidator;

/**
 * App\Actions\Customers\Registerのバリデータ
 */
class Validator implements IValidator
{
    /**
     * バリデーションの結果を返してくれる
     *
     * @param boolean $isPost
     * @return ValidationResult
     */
    public function result(bool $isPost): ValidationResult
    {
        if (!$isPost) {
            return ValidationResult::inValid('不正なリクエストです。');
        }

        return ValidationResult::valid('success');
    }
}
