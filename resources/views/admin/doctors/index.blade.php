@extends('admin.templates.index')

@push('styles')
@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table w-100 table-hover data-table" id="data-table">
            <thead>
                <tr class="text-left text-capitalize">
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Specialization_id</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Degree</th>
                    <th>Year_of_completion</th>
                    <th>Opd_time</th>

                    <th width="20%">action</th>
                </tr>
            </thead>
            <tbody class="tbody-sortable">
                @forelse ($doctors as $key => $doctor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->specialization_id }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>
                            <div class="img-thumbnail">
                                <img src="{{ asset('assets/images/doctors/' . $doctor->image)}}" height="80" alt="Img">
                            </div>
                        </td>
                        <td>{{ $doctor->degree }}</td>
                        <td>{{ $doctor->year_of_completion }}</td>

                        <td>{{ $doctor->status == 'active' ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.doctors.destroy', $doctor->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
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
