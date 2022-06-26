<?php

declare(strict_types=1);

namespace App\Controller;

use App\Actions\Customers\Register\Register;
use App\Model\Table\CustomersTable;

final class CustomersController extends AppController
{
    private Register $register;

    /**
     * プロパティにインスタンスを入れ込む
     *
     * @return void
     */
    final public function initialize(): void
    {
        parent::initialize();
        $this->register = new Register(
            new CustomersTable()
        );
    }

    /**
     * 新規会員登録ページ
     *
     * @return void
     */
    final public function register(): void
    {
        $validationResult = $this->register->action($this->request->is('post'), $this->getRequest()->getData());

        $this
            ->set('message', $validationResult->getMessage())
            ->viewBuilder()
            ->setClassName('Json')
            ->setOption('serialize', 'message');
    }
}
