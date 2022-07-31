<?php

namespace App\DataTables;

use App\Models\Perpindahan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PerpindahanDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.perpindahan.aksi', [
                    'model' => $model,
                    'url_show' => route('perpindahan.show', $model->id),
                    'url_edit' => route('perpindahan.edit', $model->id),
                    'url_destroy' => route('perpindahan.destroy', $model->id),
                ]);
            })
            ->editColumn('tanggal_pindah', function ($model) {
                return $model->tanggal_pindah->format('d-m-Y');
            })
            ->rawColumns(['action', 'tanggal_pindah'])
            ->setRowId('id');
    }

    public function query(Perpindahan $model): QueryBuilder
    {
        return $model->latest()->with('penduduk:id,nik,nama,jenis_kelamin')->select('tb_perpindahan.*')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('perpindahan-table')
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
            Column::make('penduduk.nik')->title('NIK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('penduduk.nama')->title('Nama')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('penduduk.jenis_kelamin')->title('JK')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('tanggal_pindah')->title('Tgl Pindah')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('tujuan_pindah')->title('Tujuan')->addClass('text-left')->searchable(true)->orderable(true),
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
        return 'Perpindahan_' . date('YmdHis');
    }
}
