<?php

namespace App\DataTables;

use App\Models\Kelahiran;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelahiranDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.kelahiran.aksi', [
                    'model' => $model,
                    'url_show' => route('kelahiran.show', $model->id),
                    'url_edit' => route('kelahiran.edit', $model->id),
                    'url_destroy' => route('kelahiran.destroy', $model->id),
                ]);
            })
            ->editColumn('tanggal_lahir', function ($model) {
                return $model->tanggal_lahir->format('d-m-Y');
            })
            ->rawColumns(['action', 'tanggal_lahir'])
            ->setRowId('id');
    }

    public function query(Kelahiran $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kelahiran-table')
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
            Column::make('nama_bayi')->title('Nama Bayi')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('jenis_kelamin')->title('JK')->addClass('text-center')->searchable(false)->orderable(false),
            Column::make('tempat_lahir')->title('Tpt Lahir')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('tanggal_lahir')->title('Tgl Lahir')->addClass('text-center')->searchable(true)->orderable(true),
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
        return 'Kelahiran_' . date('YmdHis');
    }
}
