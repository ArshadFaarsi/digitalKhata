@extends('layouts.admin.master')
@section('content')
    <div class="select2-drpdwn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-header">Create Account</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.accounts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="required" for="title">Account Name</label>
                                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                    name="name" id="name" value="{{ old('name', '') }}">
                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
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
                                <select class="form-control select2" name="users[]" id="users" multiple>
                                    @foreach ($users as $user)
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
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
