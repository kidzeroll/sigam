<?php

namespace App\DataTables;

use App\Models\Hubungan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HubunganDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.hubungan.aksi', [
                    'model' => $model,
                    'url_show' => route('hubungan.show', $model->id),
                    'url_edit' => route('hubungan.edit', $model->id),
                    'url_destroy' => route('hubungan.destroy', $model->id),
                ]);
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(Hubungan $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('hubungan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->autoWidth(false)
            ->responsive(true);
    }

    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center col-1'),
            Column::make('nama')->title('Hubungan Dalam Keluarga')->addClass('text-left')->searchable(true)->orderable(true),
            Column::computed('action')
                ->title('<i class="fas fa-cog"></i>')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center col-2'),
        ];
    }

    protected function filename(): string
    {
        return 'Hubungan_' . date('YmdHis');
    }
}
