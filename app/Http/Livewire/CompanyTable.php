<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class CompanyTable extends LivewireTableComponent
{
    protected $model = Company::class;

    public $showButtonOnHeader = true;

    public $buttonComponent = 'companies.table_components.add_button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setDefaultSort('created_at', 'desc');

        $this->setThAttributes(function (Column $column) {
            if($column->isField('created_at') || $column->isField('is_active')) {
                return [
                    'class' =>  'd-flex justify-content-center'
                ];
            }

            return [
                'class' => 'text-center',
            ];
        });
        $this->setTableAttributes([
            'default' => false,
            'class'   => 'table table-striped',
        ]);

        $this->setQueryStringStatus(false);

        $this->setFilterPillsStatus(false);

    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.company.employer_name'), "user.first_name")
                ->sortable()
                ->searchable()
                ->view('companies.table_components.company_name'),

            Column::make(__('messages.company.is_featured'), "user.last_name")
                ->view('companies.table_components.is_featured'),

            Column::make(__('messages.company.email_verified'), "user.email_verified_at")
                ->view('companies.table_components.email_verified'),

            Column::make(__('messages.common.status'), "user.is_active")
                ->sortable()
                ->view('companies.table_components.status'),

            Column::make(__('messages.common.action'), "id")
                ->view('companies.table_components.action_button'),
        ];
    }

    public function builder(): Builder
    {
        return Company::with('user', 'activeFeatured','featured')->select('companies.*');
    }

    public function filters(): array
    {
        return [

            SelectFilter::make(__('messages.filter_name.featured_company'))
                ->options([
                    ''    => (__('messages.filter_name.select_featured_company')),
                    'yes' => (__('messages.common.yes')),
                    'no'  => (__('messages.common.no')),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        if($value == 'yes'){
                            $builder->with('featured')->whereHas('featured');
                        } else{
                            $builder->with('featured')->doesntHave('featured');
                        }
                    }
                ),

            SelectFilter::make(__('messages.filter_name.status'))
                ->options([
                    '' => (__('messages.filter_name.select_status')),
                    1  => (__('messages.common.active')),
                    2  => (__('messages.common.de_active')),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        if ($value == 1) {
                            $builder->where('users.is_active', '=', 1);
                        } else {
                            $builder->where('users.is_active', '=', 0);
                        }
                    }
                ),
        ];
    }
}
