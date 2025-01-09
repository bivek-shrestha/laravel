@extends('admin.templates.create')

@push('styles')
@endpush

@section('form_content')
    @include('admin.slider.form', ['action' => 'create'])
@endsection

@push('scripts')
@endpush
