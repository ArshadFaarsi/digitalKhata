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
                    <thead class="bg-primary">
                        <tr>
                            <th>Id</th>
                            <th>Account Name</th>
                            <th>Members</th>
                            <th>Record</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $key => $account)
                            <tr data-entry-id="{{ $account->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $account->name ?? '' }}
                                </td>
                                <td>
                                    @foreach ($account->users as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="badge badge-warning"
                                        href="{{ route('admin.account.member', $account->id) }}">veiw</a>
                                </td>
                                <td>
                                    @can('account_edit')
                                        <a href="{{ route('admin.accounts.edit', $account->id) }}"><i data-feather="edit"
                                                class="text-info"></i></a>
                                    @endcan

                                    @can('account_delete')
                                        <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
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
