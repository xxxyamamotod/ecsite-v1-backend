<?php

declare(strict_types=1);

namespace App\Actions\Customers\Register;

/**
 * App\Actions\Customers\Register\Registerのバリデーション結果用
 */
class ValidationResult
{
    private string $message;
    private bool $_isValid;

    /**
     * @param string $message
     * @param boolean $_isValid
     */
    private function __construct(
        string $message,
        bool $_isValid
    ) {
        $this->message = $message;
        $this->_isValid = $_isValid;
    }

    /**
     * 有効な（バリデーションを通過した）ValidationResultインスタンスを返す
     *
     * @param string $message
     * @return ValidationResult
     */
    public static function valid(string $message): ValidationResult
    {
        return new ValidationResult($message, true);
    }

    /**
     * 有効でない（バリデーションに引っかかった）ValidationResultインスタンスを返す
     *
     * @param string $message
     * @return ValidationResult
     */
    public static function inValid(string $message): ValidationResult
    {
        return new ValidationResult($message, false);
    }

    /**
     * messageプロパティのゲッター
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * _inValidプロパティのゲッター
     *
     * @return boolean
     */
    public function isValid(): bool
    {
        return $this->_isValid;
    }
}
