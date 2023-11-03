@extends('layouts.admin.master')
@section('content')
    <div class="select2-drpdwn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Account Detail</div>
                    <div class="select2-drpdwn">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.member.update', $member->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="required" for="name">Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" id="name" value="{{ $member->user->name }}"
                                        readonly>
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="required" for="debit">Debit</label>
                                    <input class="form-control {{ $errors->has('debit') ? 'is-invalid' : '' }}"
                                        type="text" name="debit" id="debit" value="{{ $member->debit }}"
                                        required>
                                    @if ($errors->has('debit'))
                                        <div class="text-danger">
                                            {{ $errors->first('debit') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="required" for="ledger">Dep</label>
                                    <input class="form-control {{ $errors->has('ledger') ? 'is-invalid' : '' }}"
                                        type="number" name="ledger" id="ledger" value="{{ $member->ledger }}"
                                        required>
                                    @if ($errors->has('ledger'))
                                        <div class="text-danger">
                                            {{ $errors->first('ledger') }}
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
