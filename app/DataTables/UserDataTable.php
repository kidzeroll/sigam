<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('backend.user.aksi', [
                    'model' => $model,
                    'url_show' => route('user.show', $model->id),
                    'url_edit' => route('user.edit', $model->id),
                    'url_destroy' => route('user.destroy', $model->id),
                ]);
            })
            ->editColumn('role', function ($model) {
                if ($model->role == 'admin') {
                    return '<div class="badge badge-primary"><span>' . $model->role . '</span></div>';
                }

                if ($model->role == 'petugas') {
                    return '<div class="badge badge-warning"><span>' . $model->role . '</span></div>';
                }
            })
            ->rawColumns(['action', 'role'])
            ->setRowId('id');
    }

    public function query(User $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
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
            Column::make('name')->title('Nama')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('email')->title('Email')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('gender')->title('JK')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('role')->title('Role')->addClass('text-center')->searchable(false)->orderable(true),
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
        return 'User_' . date('YmdHis');
    }
}
