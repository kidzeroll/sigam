<?php

namespace App\DataTables;

use App\Models\SuratKeluar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratKeluarDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.surat-keluar.aksi', [
                    'model' => $model,
                    'url_show' => route('surat-keluar.show', $model->id),
                    'url_edit' => route('surat-keluar.edit', $model->id),
                    'url_destroy' => route('surat-keluar.destroy', $model->id),
                ]);
            })
            ->addColumn('tanggal_surat', function ($model) {
                return $model->tanggal_surat->format('d-m-Y');
            })
            ->rawColumns(['action', 'tanggal_surat'])
            ->setRowId('id');
    }

    public function query(SuratKeluar $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('surat-keluar-table')
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
            Column::make('no_agenda')->title('No Agenda')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('no_surat')->title('No Surat')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('tanggal_surat')->title('TGL Surat')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('penerima')->title('Penerima')->addClass('text-left')->searchable(true)->orderable(true),
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
        return 'SuratKeluar_' . date('YmdHis');
    }
}
