@extends('user-auth.layouts.app')

@section('title')
    Seer | A propos
@endsection

@section('content')
    @include('user-auth.layouts.seer-nav')

    <div class="d-flex justify-content-center">
        <h1 class="text-secondary">SEER?</h1>
        @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif
    </div>


    <div class="card mb-3">
        <img src="https://wowslider.com/sliders/demo-93/data1/images/lake.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
        <img src="https://wowslider.com/sliders/demo-93/data1/images/landscape.jpg" class="card-img-top" alt="...">
      </div>
@endsection
