<?php

namespace App\DataTables;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PengaduanDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.pengaduan.aksi', [
                    'model' => $model,
                    'url_show' => route('pengaduan.show', $model->id),
                    'url_destroy' => route('pengaduan.destroy', $model->id),
                    'url_tanggapi' => route('pengaduan.tanggapi', $model->id),
                    'url_wa' => route('pengaduan.beritahukan', $model->id),
                ]);
            })
            ->editColumn('status', function ($model) {
                if ($model->status == 'menunggu') {
                    return '<span class="badge badge-danger">' . $model->status . '</span>';
                }
                if ($model->status == 'ditanggapi') {
                    return '<span class="badge badge-primary">' . $model->status . '</span>';
                }
                if ($model->status == 'selesai') {
                    return '<span class="badge badge-success">' . $model->status . '</span>';
                }
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d-m-Y');
            })
            ->rawColumns(['action', 'status', 'created_at'])
            ->setRowId('id');
    }

    public function query(Pengaduan $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pengaduan-table')
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
            Column::make('judul')->title('Judul')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('created_at')->title('Tgl')->addClass('text-center')->searchable(true)->orderable(true),
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
        return 'Pengaduan_' . date('YmdHis');
    }
}
