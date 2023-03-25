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

            <form method="POST" action="{{ route('locations.update', ['location' => $location->id]) }}" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="Title" value="{{ $location->Title }}"
                        placeholder="Some title" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="imgUrl">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" value="{{ $location->country }}"
                        placeholder="Pakistan" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $location->city }}"
                        placeholder="Rawalpindi" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Is Favorite</label>
                    <select class="form-select" name="isFav" required>
                        <option value="" selected>Select one</option>
                        <option value="1" @if ($location->isFav == '1') selected @endif>Yes</option>
                        <option value="0" @if ($location->isFav == '0') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id" value="{{ $location->category_id }}" required>
                        <option value="" selected>Select one</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $location->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @empty
                            <option value="">No category found.</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Details</label>
                    <textarea class="form-control" name="details" rows="5" placeholder="Some details" required>{{ $location->details }}</textarea>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success text-white">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
