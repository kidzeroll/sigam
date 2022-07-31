<?php

namespace App\DataTables;

use App\Models\PerangkatGampong;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PerangkatGampongDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.perangkat-gampong.aksi', [
                    'model' => $model,
                    'url_show' => route('perangkat-gampong.show', $model->id),
                    'url_edit' => route('perangkat-gampong.edit', $model->id),
                    'url_destroy' => route('perangkat-gampong.destroy', $model->id),
                ]);
            })
            ->addColumn('photo_path', function ($model) {
                return '<img src="' . asset('storage/' . $model->photo_path) . '" width="60"/>';
            })
            ->rawColumns(['action', 'photo_path'])
            ->setRowId('id');
    }

    public function query(PerangkatGampong $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('perangkat-gampong-table')
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
            Column::make('nama')->title('Nama')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('jenis_kelamin')->title('JK')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('jabatan')->title('Jabatan')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('photo_path')->title('Foto')->addClass('text-center')->searchable(false)->orderable(false),
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
        return 'PerangkatGampong_' . date('YmdHis');
    }
}
