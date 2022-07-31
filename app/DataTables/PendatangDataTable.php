<?php

namespace App\DataTables;

use App\Models\Pendatang;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendatangDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.pendatang.aksi', [
                    'model' => $model,
                    'url_show' => route('pendatang.show', $model->id),
                    'url_edit' => route('pendatang.edit', $model->id),
                    'url_destroy' => route('pendatang.destroy', $model->id),
                ]);
            })
            ->editColumn('status', function ($model) {
                if ($model->status == "proses") {
                    return '<span class="badge badge-warning">' . $model->status . '</span>';
                }
                if ($model->status == "menetap") {
                    return '<span class="badge badge-primary">' . $model->status . '</span>';
                }
                if ($model->status == "selesai") {
                    return '<span class="badge badge-success">' . $model->status . '</span>';
                }
            })
            ->editColumn('tanggal_datang', function ($model) {
                return $model->tanggal_datang->format('d-m-Y');
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    public function query(Pendatang $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendatang-table')
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
            Column::make('nik')->title('NIK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('nama')->title('Nama')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('tanggal_datang')->title('Tgl Datang')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('lama_kedatangan')->title('Lama Kedatangan')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('tujuan_kedatangan')->title('Tujuan')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('status')->title('Status')->addClass('text-center')->searchable(false)->orderable(false),
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
        return 'Pendatang_' . date('YmdHis');
    }
}
