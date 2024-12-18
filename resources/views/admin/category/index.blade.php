<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Category Details</h4>

                            <a href="{{ route('category.create') }}" class="btn btn-primary"> Add</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                SN
                                            </th>
                                            <th>English Category</th>
                                            <th>Nepali Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorys as $category)
                                            <tr>
                                                <td>
                                                    {{ $category->position }}
                                                </td>
                                                <td>{{ $category->eng_title }}</td>
                                                <td>{{ $category->nep_title }}</td>
                                                <td>
                                                    <form action="{{ route('category.destroy', $category->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                        <a href="{{ route('category.edit', $category->id) }}"
                                                            class="btn btn-sm btn-primary">Detail</a>
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
