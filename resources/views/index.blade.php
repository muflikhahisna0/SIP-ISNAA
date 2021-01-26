@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
<div class="section-body">
    <x-alert type="success" judul="informasi" :isipesan="$isipesan" />
</div>

@endsection

@push('page-scripts')
<script></script>
@endpush