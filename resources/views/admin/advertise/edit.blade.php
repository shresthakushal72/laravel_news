<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Advertise Edit</h4>
                    <a href="{{ route('advertise.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('advertise.update', $advertise->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">


                            <div class="mb-3 col-6">
                                <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="company_name" id="company_name" class="form-control"
                                    value="{{ old('company_name') ?? $advertise->company_name }}">
                                @error('company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="contact">Contact <span class="text-danger">*</span></label>
                                <input type="text" name="contact" id="contact" class="form-control"
                                    value="{{ old('contact') ?? $advertise->contact }}">
                                @error('contact')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="redirect_url">redirect_url <span class="text-danger">*</span></label>
                                <input type="text" name="redirect_url" id="redirect_url" class="form-control"
                                    value="{{ old('redirect_url') ?? $advertise->redirect_url }}">
                                @error('redirect_url')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="expire_date">expire_date <span class="text-danger">*</span></label>
                                <input type="text" name="expire_date" id="expire_date" class="form-control"
                                    value="{{ old('expire_date') ?? $advertise->expire_date }}">
                                @error('expire_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-6">
                                <label for="banner">banner <span class="text-danger">*</span></label>
                                <input type="file" name="banner" id="banner" class="form-control">
                                <img src="{{ asset($advertise->banner) }}" width="120" alt="{{ $advertise->company_name }}">
                                @error('banner')
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
