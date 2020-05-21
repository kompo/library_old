@extends('app',[
  'LeftSidebar' => new App\Http\Komposers\LeftSidebar(),
  'RightSidebar' => new App\Http\Komposers\RightSidebar(),
  'Footer' => null //we disable the Footer
])

@push('header')

<!-- Additional styles or header information relevant to the Admin Panel only -->

@endpush

@push('scripts')

<!-- Additional scripts relevant to the Admin Panel only -->

@endpush