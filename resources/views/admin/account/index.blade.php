@extends('layouts.admin.master')
@section('content')
    @can('account_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.accounts.create') }}">Add New Account</a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">Account List</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Account">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>Id</th>
                            <th>Account Name</th>
                            <th>Members</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $key => $account)
                            <tr data-entry-id="{{ $account->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $account->name ?? '' }}
                                </td>
                                <td>
                                    @foreach ($account->user as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('account_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.accounts.edit', $account->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('account_delete')
                                        <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
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
