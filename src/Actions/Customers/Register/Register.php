<?php

declare(strict_types=1);

namespace App\Actions\Customers\Register;

use App\Actions\Customers\Register\ValidationResult;
use App\Model\Table\CustomersTable;
use Cake\Http\Exception\BadRequestException;

interface IValidator
{
    public function result(bool $isPost);
}

/**
 * App\Controller\CustomersController内 registerメソッド用
 */
class Register
{
    private CustomersTable $customersTable;
    private IValidator $validator;

    /**
     * DI注入
     *
     * @param CustomersTable $customersTable
     * @param Validator $validator
     */
    public function __construct(
        CustomersTable $customersTable,
        IValidator $validator
    ) {
        $this->customersTable = $customersTable;
        $this->validator = $validator;
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
        $validationResult = $this->validator->result($isPost);
        if (!$validationResult->isValid()) {
            throw new BadRequestException($validationResult->getMessage());
        }

        $newCustomer = $this->customersTable->newEntity($requests);
        $this->customersTable->save($newCustomer);

        return $validationResult;
    }
}
