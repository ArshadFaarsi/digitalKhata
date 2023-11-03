@extends('layouts.admin.master')
@section('content')
@can('permission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead class="bg-primary">
                    <tr>
                        <th>
                            {{ trans('cruds.permission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.permission.fields.title') }}
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td>
                                {{ $loop->iteration}}
                            </td>
                            <td>
                                {{ $permission->title ?? '' }}
                            </td>
                            <td>
                                @can('permission_show')
                                <a href="{{ route('admin.permissions.show', $permission->id) }}"><i data-feather="eye"
                                    class="text-success"></i></a>
                            @endcan

                            @can('permission_edit')
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"><i data-feather="edit"
                                    class="text-info"></i></a>
                            @endcan

                            @can('permission_delete')
                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST"
                                    style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="border" type="submit"><i data-feather="trash"
                                        class="text-danger"></i></button>
                                </form>
                            @endcan



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
