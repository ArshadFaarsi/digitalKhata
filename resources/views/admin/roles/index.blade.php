@extends('layouts.admin.master')
@section('content')
    @can('role_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.roles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                    <thead class="bg-primary">
                        <tr>
                            <th>
                                {{ trans('cruds.role.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.permissions') }}
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>
                                    {{ $loop->iteration}}
                                </td>
                                <td>
                                    {{ $role->title ?? '' }}
                                </td>
                                <td>
                                    @foreach ($role->permissions as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>

                                    @can('role_show')
                                        <a href="{{ route('admin.roles.show', $role->id) }}"><i data-feather="eye"
                                            class="text-primary"></i></a>
                                    @endcan

                                    @can('role_edit')
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"><i data-feather="edit"
                                            class="text-info"></i></a>
                                    @endcan

                                    @can('role_delete')
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
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
