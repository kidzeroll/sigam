<?php

namespace App\DataTables;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.surat.aksi', [
                    'model' => $model,
                    'url_show' => route('surat.show', $model->id),
                    'url_destroy' => route('surat.destroy', $model->id),
                    'url_ttd' => route('surat.ttd', $model->id),
                    'url_wa' => route('surat.wa', $model->id),
                ]);
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d-m-Y');
            })
            ->editColumn('status', function ($model) {
                if ($model->status == 'menunggu') {
                    return '<span class="badge badge-danger">' . $model->status . '</span>';
                }
                if ($model->status == 'ditandatangani') {
                    return '<span class="badge badge-primary">' . $model->status . '</span>';
                }
                if ($model->status == 'selesai') {
                    return '<span class="badge badge-success">' . $model->status . '</span>';
                }
            })
            ->rawColumns(['action', 'created_at', 'status'])
            ->setRowId('id');
    }

    public function query(Surat $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('surat-table')
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
            Column::make('jenis_surat')->title('Jenis')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('created_at')->title('Tanggal')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('keperluan')->title('Keperluan')->addClass('text-left')->searchable(true)->orderable(true),
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
        return 'Surat_' . date('YmdHis');
    }
}
