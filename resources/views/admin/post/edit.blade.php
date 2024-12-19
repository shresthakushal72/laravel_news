<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Post Edit</h4>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="title">Post Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title') ?? $post->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <input type="text" name="description" id="description" class="form-control"
                                    value="{{ $post->description }}">
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="Meta Words">Meta Words <span class="text-danger">*</span></label>
                                <input type="text" name="Meta Words" id="Meta Words" class="form-control"
                                    value="{{ $post->meta_description }}">
                                @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="meta_description">Meta Description <span class="text-danger">*</span></label>
                                <input type="text" name="meta_description" id="meta_description" class="form-control"
                                    value="{{ $post->meta_description }}">
                                @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="approved" {{ $post->status == 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="pending" {{ $post->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="rejected" {{ $post->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{ asset($post->image) }}" width="120" alt="{{ $post->title }}">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-12">
                                <button type="submit" class="btn btn-success">Update Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--
    primary-blue
    success-green
    danger-red
--}}
