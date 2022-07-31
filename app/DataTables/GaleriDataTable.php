<?php

namespace App\DataTables;

use App\Models\Galeri;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GaleriDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.galeri.aksi', [
                    'model' => $model,
                    'url_show' => route('galeri.show', $model->id),
                    'url_edit' => route('galeri.edit', $model->id),
                    'url_destroy' => route('galeri.destroy', $model->id),
                ]);
            })
            ->addColumn('photo_path', function ($model) {
                return '<img src="' . asset('storage/' . $model->photo_path) . '" width="100px" height="100px" align="center"/>';
            })
            ->rawColumns(['action', 'photo_path'])
            ->setRowId('id');
    }

    public function query(Galeri $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('galeri-table')
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
            Column::make('photo_path')->title('Foto')->addClass('text-center')->searchable(false)->orderable(false),
            Column::make('deskripsi')->title('Deskripsi')->addClass('text-left')->searchable(true)->orderable(true),
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
        return 'Galeri_' . date('YmdHis');
    }
}
