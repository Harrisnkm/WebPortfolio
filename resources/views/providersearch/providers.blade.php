@extends('layouts.providersearch')

@section('content')


  <provider-search-providers providers="{{$providers}}" csrf="{{csrf_token()}}"></provider-search-providers>


@endsection
