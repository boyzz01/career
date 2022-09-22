<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Language;

class LanguageTable extends LivewireTableComponent
{
    /**
     * @var string
     */
    protected $model = Language::class;

    /**
     * @var bool
     */
    public $showButtonOnHeader = true;

    /**
     * @var string
     */
    public $buttonComponent = 'languages.table-components.add_button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setDefaultSort('created_at', 'desc');

        $this->setTableAttributes([
            'default' => false,
            'class' => 'table table-striped',
        ]);

        $this->setThAttributes(function (Column $column){
            if($column->isField('language')){
                return [
                    'style' =>  'width: 60%'
                ];
            }
            if($column->isField('iso_code')){
                return [
                    'style' =>  'width: 20%'
                ];
            }
            if($column->isField('id')){
                return [
                    'class' => 'text-center',
                ];
            }
            return [];
        });
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '2') {
                return [
                    'class' => 'text-center',
                    'width' => '15%'
                ];
            }
            return [];
        });

        $this->setQueryStringStatus(false);
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('messages.language.language'), "language")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.language.iso_code'), "iso_code")
                ->sortable()
                ->searchable()
                ->view('languages.table-components.iso_code'),
            Column::make(__('messages.common.action'), "id")
                ->view('languages.table-components.action_button'),
        ];
    }
}
