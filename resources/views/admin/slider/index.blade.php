@extends('admin.templates.index')

@push('styles')
@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table w-100 table-hover data-table" id="data-table">
            <thead>
                <tr class="text-left text-capitalize">
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Sub-title</th>
                    <th>Status</th>
                    <th width="20%">action</th>
                </tr>
            </thead>
            <tbody class="tbody-sortable">
                @forelse ($slider as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="img-thumbnail" style="width: 120px; height: 80px;">
                                <img src="{{ asset('assets/images/' .  $item->image ) }}" alt="" style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->subtitle ?? '---' }}</td>
                        <td>{{ $item->status == 'active' ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.slider.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.slider.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
@endpush
