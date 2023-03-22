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
                <h2 class="mb-4 h5">{{ __('Create Location') }}</h2>
            </div>

            <form method="POST" action="{{ route('locations.store') }}" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="Title" placeholder="Some title" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="imgUrl" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" placeholder="Pakistan" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Rawalpindi" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Is Var</label>
                    <select class="form-select" name="isVar" required>
                        <option value="" selected>Select one</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id" required>
                        <option value="" selected>Select one</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No category found.</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Details</label>
                    <textarea class="form-control" name="details" rows="5" placeholder="Some details" required></textarea>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success text-white">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
