@extends('layouts.admin.master')
@section('content')
    <div class="select2-drpdwn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Statement</div>
                    <div class="select2-drpdwn">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.statement.update', $statement->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="required" for="paid">Paid</label>
                                    <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}"
                                        type="number" name="paid" id="paid" value="{{ $statement->paid }}"
                                        required>
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
                                                value="{{ $user->id }}"{{ $user->id == $statement->paid_by ? 'selected' : '' }}>
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
                                            <option value="{{ $user->id }}"
                                                {{ $statement->users->contains($user->id) ? 'selected' : '' }}>
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
                                        value="{{ $statement->description }}" required>
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
    </div>
@endsection
