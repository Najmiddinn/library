@extends('layouts.mainBackend')
@section('title')
    {{__('msg.Create')}}
@endsection

@section('content')
    <div class="page-header card">
    </div>
    <div class="card">
        <div class="content-header">
            <div class="container-fluid card-block">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{__('msg.Create')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('msg.Home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
                            <li class="breadcrumb-item active">{{__('msg.Create')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nameId">{{__('msg.Name')}}</label>
                            <input type="text" name="name" id="nameId" class="form-control @error('name') error-data-input is-invalid @enderror" value="{{ old('name') }}" required>
                            <span class="error-data">@error('name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="emailId">email</label>
                            <input type="email" name="user_email" id="emailId" class="form-control @error('user_email') error-data-input @enderror" value="{{ old('user_email') }}" required>
                            <span class="error-data">@error('user_email'){{$message}}@enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="user_type_id">{{__('msg.user_type')}}</label>
                            <select name="user_type" id="user_type_id" required class="form-control select2 @error('user_type') is-invalid error-data-input @enderror" value="{{ old('user_type') }}">
                                <option value="">------------</option>
                                <option value="{{0}}">User</option>
                                <option value="{{1}}">Admin</option>
                            </select>
                            <span class="error-data">@error('user_type'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Roles</label>
                            <select name="role[]" id="role_id" multiple data-placeholder="Select a role" class="form-control select2 @error('role') is-invalid error-data-input @enderror">
                                @if(!empty($roles))
                                    <option value=" ">------------</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="error-data">@error('role'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="permission_id">Permissions</label>
                            
                            <select name="permission[]" multiple data-placeholder="Select a permission" id="permission_id"  class="form-control select2 @error('permission') is-invalid error-data-input @enderror">
                                @if(!empty($permissions))
                                    <option value="">------------</option>
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            
                            <span class="error-data">@error('permission'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="passwordId">New password</label>
                            <input type="password" name="password"  id="passwordId" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                            <span class="error-data">@error('password'){{$message}}@enderror</span>
                        </div>
                
                        <div class="form-group">
                            <label for="password_confirmation_id">Confirmation password</label>
                            <input type="password" name="password_confirmation"  id="password_confirmation_id" class="form-control " value="{{ old('password') }}" required>
                            <span class="error-data">@error('password_confirmation'){{$message}}@enderror</span>
                        </div>

                        <div class="card-footer">
                            <a href="{{route('user.index')}}" class="btn btn-danger">{{__('msg.Cancel')}}</a>
                            <button type="submit" class="btn btn-success">{{__('msg.Create')}}</button>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </form>

@endsection





