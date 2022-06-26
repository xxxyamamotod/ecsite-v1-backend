<?php

declare(strict_types=1);

namespace App\Actions\Customers\Register;

use App\Actions\Customers\Register\ValidationResult;
use App\Actions\Customers\Register\Validator;
use App\Model\Table\CustomersTable;
use Cake\Http\Exception\BadRequestException;

/**
 * App\Controller\CustomersController内 registerメソッド用
 */
class Register
{
    private CustomersTable $customersTable;

    /**
     * DI注入
     *
     * @param CustomersTable $customersTable
     */
    public function __construct(
        CustomersTable $customersTable
    ) {
        $this->customersTable = $customersTable;
    }

    /**
     * registerメソッドのアクション
     *
     * @param boolean $isPost
     * @param array $requests
     * @return ValidationResult
     */
    public function action(bool $isPost, array $requests): ValidationResult
    {
        $validationResult = Validator::result($isPost);
        if (!$validationResult->isValid()) {
            throw new BadRequestException($validationResult->getMessage());
        }

        $newCustomer = $this->customersTable->newEntity($requests);
        $this->customersTable->save($newCustomer);

        return $validationResult;
    }
}
