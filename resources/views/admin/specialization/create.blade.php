@extends('admin.templates.create')

@push('styles')
@endpush

@section('form_content')
    @include('admin.specialization.form', ['action' => 'create'])
@endsection

@push('scripts')
@endpush
