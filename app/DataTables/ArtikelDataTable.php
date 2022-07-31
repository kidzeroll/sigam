<?php

namespace App\DataTables;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;


class ArtikelDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.artikel.aksi', [
                    'model' => $model,
                    'url_show' => route('artikel.show', $model->id),
                    'url_edit' => route('artikel.edit', $model->id),
                    'url_destroy' => route('artikel.destroy', $model->id),
                ]);
            })
            ->addColumn('photo_path', function ($model) {
                return '<img src="' . asset('storage/' . $model->photo_path) . '" width="90px" height="90px" align="center"/>';
            })
            ->addColumn('isi', function ($model) {
                return Str::limit($model->isi, 60, '...');
            })
            ->rawColumns(['action', 'photo_path', 'isi'])
            ->setRowId('id');
    }

    public function query(Artikel $model): QueryBuilder
    {
        return $model->latest()->with('kategori:id,nama')->select('tb_artikel.*')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('artikel-table')
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
            Column::make('judul')->title('Judul')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('kategori.nama')->title('Kategori')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('isi')->title('Isi')->addClass('text-left')->searchable(true)->orderable(false),
            Column::make('photo_path')->title('Thumbnail')->addClass('text-center')->searchable(false)->orderable(false),
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
        return 'Artikel_' . date('YmdHis');
    }
}
