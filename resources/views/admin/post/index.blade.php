<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Posts Details</h4>

                            <a href="{{ route('post.create') }}" class="btn btn-primary"> Add</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                SN
                                            </th>
                                            <th>Post Title</th>
                                            <th>Featured Image</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $index => $post)
                                            <tr>
                                                <td>
                                                    {{ ++$index }}
                                                </td>

                                                <td>{{ $post->title }}</td>
                                                <td><img width="120" src="{{ asset($post->image) }}"
                                                        alt="{{ $post->title }}"></td>
                                                <td>{{ $post->views }}</td>

                                                <td>
                                                    @if ($post->status == 'pending')
                                                        <span
                                                            class="badge bg-warning text-white">{{ $post->status }}</span>
                                                    @elseif ($post->status == 'approved')
                                                        <span
                                                            class="badge bg-success text-white">{{ $post->status }}</span>
                                                    @else
                                                        <span
                                                            class="badge bg-danger text-white">{{ $post->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('post.destroy', $post->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="{{ route('post.edit', $post->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
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
    </section>
</x-app-layout>
