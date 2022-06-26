<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersTable Test Case
 */
class CustomersTableTest extends TestCase
{
    protected CustomersTable $customersTable;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->customersTable = new CustomersTable();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CustomersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CustomersTable::buildRules()
     */
    public function testBuildRules(): void
    {
    }
}
