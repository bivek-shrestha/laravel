<div class="form-group row">
    <div class="col-md-6">
        <label for="name">Name: <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" name="name"
            value="{{ old('name', $item->name ?? '') }}" placeholder="Enter doctor's name">
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Specialization -->
<div class="form-group row">
    <div class="col-md-6">
        <label for="specialization_id">Specialization ID: <span class="text-danger">*</span></label>
            <select name="specialization_id" class="form-control" id="">
                <option value="">---Select specialization---</option>
                @foreach ($specializations as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        @error('specialization_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Phone -->
<div class="form-group row">
    <div class="col-md-6">
        <label for="phone">Phone: <span class="text-danger">*</span></label>
        <input type="text" id="phone" class="form-control" name="phone"
            value="{{ old('phone') }}" placeholder="Enter phone number">
        @error('phone')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Image -->
<div class="form-group row">
    <div class="col-md-6">
        <div class="col-6 my-2">
            <label for="image">Image: <span class="text-danger">*</span></label>
            <input type="file" class="form-control" id="image" name="image"
                placeholder="image">
            @if (isset($item) && $item->image)
                <div class="">
                    <img src="{{ asset('assets/images/' . $item->image) }}"
                        class="img-thumbnail mt-3" alt="specialization image"
                        height="200" width="200">
                </div>
            @endif
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            </div>
            </div>

<!-- Degree -->
<div class="form-group row">
    <div class="col-md-6">
        <label for="degree">Degree: <span class="text-danger">*</span></label>
        <input type="text" id="degree" class="form-control" name="degree"
            value="{{ old('degree') }}" placeholder="Enter degree">
        @error('degree')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Year of Completion -->
<div class="form-group row">
    <div class="col-md-6">
        <label for="year_of_completion">Year of Completion: <span class="text-danger">*</span></label>
        <input type="text" id="year_of_completion" class="form-control" name="year_of_completion"
            value="{{ old('year_of_completion') }}" placeholder="Enter year of completion">
        @error('year_of_completion')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- OPD Time -->
<div class="form-group row">
    <div class="col-md-6">
        <label for="opd_time">OPD Time: <span class="text-danger">*</span></label>
        <input type="text" id="opd_time" class="form-control" name="opd_time"
            value="{{ old('opd_time') }}" placeholder="Enter OPD time">
        @error('opd_time')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
</div>

{{-- <div class="card-footer bg-transparent">
<button type="submit" class="btn btn-success float-right btn-sm">Submit</button>
<a href="{{ route($route . 'index') }}" class="btn btn-outline-secondary float-right mr-2 btn-sm">
    <i class="fas fa-arrow-left fa-sm"></i> Go Back
</a> --}}
</div>
