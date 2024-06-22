@extends('layout/structure')

@section('mainContent')
    <section>
        <form action="{{ route('stock.store') }}" method="POST" >
            @method('POST')
            @include('stock.partials.form')
        </form>
    </section>
@endsection
