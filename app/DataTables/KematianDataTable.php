<?php

namespace App\DataTables;

use App\Models\Kematian;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KematianDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.kematian.aksi', [
                    'model' => $model,
                    'url_show' => route('kematian.show', $model->id),
                    'url_edit' => route('kematian.edit', $model->id),
                    'url_destroy' => route('kematian.destroy', $model->id),
                ]);
            })
            ->editColumn('tanggal_meninggal', function ($model) {
                return $model->tanggal_meninggal->format('d-m-Y');
            })
            ->rawColumns(['action', 'tanggal_meninggal'])
            ->setRowId('id');
    }

    public function query(Kematian $model): QueryBuilder
    {
        return $model->latest()->with('penduduk:id,nik,nama,jenis_kelamin')->select('tb_kematian.*')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kematian-table')
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
            Column::make('tanggal_meninggal')->title('Tgl Meninggal')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('keterangan')->title('Ket')->addClass('text-left')->searchable(true)->orderable(true),
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
        return 'Kematian_' . date('YmdHis');
    }
}
