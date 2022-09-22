<?php

namespace App\Http\Controllers;

use App\Repositories\SalaryCurrencyRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryCurrencyController extends AppBaseController
{
    /** @var SalaryCurrencyRepository */
    private $salaryCurrencyRepository;

    public function __construct(SalaryCurrencyRepository $salaryCurrencyRepo)
    {
        $this->salaryCurrencyRepository = $salaryCurrencyRepo;
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('salary_currencies.index');
    }
}
