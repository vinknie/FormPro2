@extends('layout.master')

@section("content")

{{ $data->name }}
{{ $data->description }}

<iframe src="/assets/{{ $data->file }}"></iframe>


@endsection