@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            <div class="d-flex align-items-baseline justify-content-between">
                <h2 class="mb-4 h5">{{ __('Edit Category') }}</h2>
            </div>

            <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}" class="row g-3"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                        placeholder="Some name" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success text-white">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
