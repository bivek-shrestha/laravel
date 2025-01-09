@extends('admin.templates.edit')

@push('styles')
@endpush

@section('form_content')
    @include('admin.specialization.form', ['action' => 'edit'])
@endsection

@push('scripts')
@endpush
