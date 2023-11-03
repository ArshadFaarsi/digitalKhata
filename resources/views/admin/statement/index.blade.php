@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header"><strong>Account Detail</strong></div>
            <div class="table-responsive">
                <table class=" text-center table table-bordered table-striped table-hover datatable datatable-Account">
                    <thead class="bg-primary">
                        <tr>
                            <th>Name</th>
                            <th>Debit</th>
                            <th>Dep</th>
                            <th>Ledger</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->user->name }}</td>
                                <td>{{ $member->debit }}</td>
                                <td>{{ $member->ledger }}</td>
                                <td>{{ $member->debit - $member->ledger }}</td>
                                <td>
                                    @can('account_edit')
                                        <a href="{{ route('admin.member.edit', $member->id) }}"><i data-feather="edit"
                                                class="text-info"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="sec_main_heading text-center mb-0">Add New Record</h5>
                    <a type="button" class="heading-color" data-bs-dismiss="modal"><span class="fa fa-times"></span></a>
                </div>
                <div class="select2-drpdwn">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.statement.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ $account->id }}">
                            <div class="form-group">
                                <label class="required" for="paid">Paid</label>
                                <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" type="number"
                                    name="paid" id="paid" value="{{ old('paid', '') }}" required>
                                @if ($errors->has('paid'))
                                    <div class="text-danger">
                                        {{ $errors->first('paid') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="paid-by">Paid By</label>
                                <select class="form-control" name="paid_by" id="paid-by" required>
                                    <option class="p-3" selected disabled>Select Member</option>
                                    @foreach ($account->users as $key => $user)
                                        <option
                                            value="{{ $user->id }}"{{ in_array($user->id, old('paidby', [])) ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('paid_by'))
                                    <div class="text-danger">
                                        {{ $errors->first('paidby') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="users">Members</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all"
                                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all"
                                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select class="form-control select2" name="users[]" id="users" multiple required>
                                    @foreach ($account->users as $key => $user)
                                        <option class="p-3" value="{{ $user->id }}"
                                            {{ in_array($user->id, old('users', [])) ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('users'))
                                    <div class="text-danger">
                                        {{ $errors->first('users') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="description">Description (optional)</label>
                                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    type="text" name="description" id="description" value="{{ old('description', '') }}"
                                    required>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('account_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                    Statement</button>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header"><strong>Statement List</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" text-center table table-bordered table-striped table-hover datatable datatable-Account">
                    <thead class="bg-primary">
                        <tr>
                            <th>Paid By</th>
                            <th>Paid</th>
                            <th>Members</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statements as $key => $statement)
                            <tr>
                                <td>{{ $statement->paidBy->name }}</td>
                                <td>{{ $statement->paid }}</td>
                                <td>
                                    @foreach ($statement->users as $user)
                                        <span class="badge badge-info">{{ $user->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $statement->created_at->format('h:sA d-M-Y') }}</td>
                                <td>{{ $statement->description }}</td>
                                <td>
                                    @can('account_edit')
                                        <a href="{{ route('admin.statement.edit', $statement->id) }}"><i data-feather="edit"
                                                class="text-info"></i></a>
                                    @endcan
                                    @can('account_delete')
                                        <form action="{{ route('admin.statement.destroy', $statement->id) }}" method="POST"
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="sec_main_heading text-center mb-0">Add New Statement</h5>
                    <a type="button" class="heading-color" data-bs-dismiss="modal"><span
                            class="fa fa-times"></span></a>
                </div>
                <div class="select2-drpdwn">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.statement.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ $account->id }}">
                            <div class="form-group">
                                <label class="required" for="paid">Paid</label>
                                <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" type="number"
                                    name="paid" id="paid" value="{{ old('paid', '') }}" required>
                                @if ($errors->has('paid'))
                                    <div class="text-danger">
                                        {{ $errors->first('paid') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="paid-by">Paid By</label>
                                <select class="form-control" name="paid_by" id="paid-by" required>
                                    <option class="p-3" selected disabled>Select Member</option>
                                    @foreach ($account->users as $key => $user)
                                        <option
                                            value="{{ $user->id }}"{{ in_array($user->id, old('paidby', [])) ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('paid_by'))
                                    <div class="text-danger">
                                        {{ $errors->first('paidby') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="users">Members</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all"
                                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all"
                                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select class="form-control select2" name="users[]" id="users" multiple required>
                                    @foreach ($account->users as $key => $user)
                                        <option class="p-3" value="{{ $user->id }}"
                                            {{ in_array($user->id, old('users', [])) ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('users'))
                                    <div class="text-danger">
                                        {{ $errors->first('users') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="required" for="description">Description (optional)</label>
                                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    type="text" name="description" id="description"
                                    value="{{ old('description', '') }}" required>
                                @if ($errors->has('description'))
                                    <div class="text-danger">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
