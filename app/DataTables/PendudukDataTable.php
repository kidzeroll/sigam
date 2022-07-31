<?php

namespace App\DataTables;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendudukDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.penduduk.aksi', [
                    'model' => $model,
                    'url_show' => route('penduduk.show', $model->id),
                    'url_edit' => route('penduduk.edit', $model->id),
                    'url_destroy' => route('penduduk.destroy', $model->id),
                ]);
            })
            ->editColumn('status', function ($model) {
                if ($model->status == 'ada') {
                    return '<span class="badge badge-primary">' . $model->status . '</span>';
                }
                if ($model->status == 'pindah') {
                    return '<span class="badge badge-warning">' . $model->status . '</span>';
                }
                if ($model->status == 'meninggal') {
                    return '<span class="badge badge-danger">' . $model->status . '</span>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    public function query(Penduduk $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('penduduk-table')
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
            Column::make('no_kk')->title('No KK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('nik')->title('NIK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('nama')->title('Nama')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('jenis_kelamin')->title('JK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('alamat')->title('Alamat')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('status')->title('Status')->addClass('text-center')->searchable(false)->orderable(true),
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
        return 'Penduduk_' . date('YmdHis');
    }
}
