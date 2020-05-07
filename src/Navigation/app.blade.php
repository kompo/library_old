@extends('kompo::app',[
  'Navbar' => new App\Http\Komposers\Navbar(),
  'Footer' => new App\Http\Komposers\Footer()
])

@push('header')
&lt;link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700&display=swap" rel="stylesheet">
&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />

@endpush

@push('scripts')

@endpush