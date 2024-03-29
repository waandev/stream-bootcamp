@extends('admin.layouts.base')

@section('title', 'Movies')

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- Alert Here --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Notification</h3>
                </div>
                <form method="POST" action="{{ route('admin.notification.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}" placeholder="Film baru nih">

                        </div>
                        <div class="form-group">
                            <label for="trailer">Body</label>
                            <input type="text" class="form-control" id="body" name="body"
                                value="{{ old('body') }}" placeholder="Describe your body / message">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Notification</h3>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Status</th>
                                        <th>Response</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->id }}</td>
                                            <td>{{ $notification->title }}</td>
                                            <td>{{ $notification->body }}</td>
                                            <td>
                                                @if ($notification->status === 'success')
                                                    <span style="color:blue;">{{ $notification->status }}</span>
                                                @else
                                                    <span style="color:red;">{{ $notification->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $notification->response }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
