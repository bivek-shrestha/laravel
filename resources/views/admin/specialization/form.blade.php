<div class="form-group row">
    <div class="col-6 my-2">
        <label for="name">Name: <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" name="name"
            value="{{ old('name', $item->name ?? '') }}" placeholder="First Name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-6 my-2">
        <label for="specialization_name">Specialization_name: <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="specialization_name" name="specialization_name"
            value="{{ old('specialization_name', $item->specialization_name ?? '') }}"
            placeholder="specialization_name">
        @error('specialization_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-6 my-2">
        <label for="description">Description: <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="description" name="description"
            value="{{ old('description', $item->description ?? '') }}" placeholder="description">
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

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
