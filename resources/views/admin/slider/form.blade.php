<div class="form-group row">

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input name="image" type="file" class="form-control" id="image">
        @if(isset($item) && $item->imageName)
        <div class="">
            <img src="{{ asset('assets/images'. $item->imageName) }}" class="img-thumbnail mt-3" alt="Uploaded Image" height="100" width="100">
        </div>
        @endif
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-6 my-2">
        <label for="title">Title: <span class="text-danger">*</span></label>
        <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $item->title ?? '') }}"
            placeholder="Enter Title">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="col-6 my-2">
        <label for="subtitle">Subtitle:</label>
        <input type="text" id="subtitle" class="form-control" name="subtitle" value="{{ old('subtitle', $item->subtitle ?? '') }}"
            placeholder="Enter Subtitle">
        @error('subtitle')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>




    <!-- Status Field -->
    <div class="col-6 my-2">
        <label for="status">Status: <span class="text-danger">*</span></label>
        <select class="form-control" id="status" name="status">
            <option value="active" {{ old('status', $item->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $item->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
