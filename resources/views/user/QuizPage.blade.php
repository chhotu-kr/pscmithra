@extends('user.dashboard')
@section('pscmithra')
<h2>Quiz Page</h2>

@livewire('user.quiz-attempt',['cat' => $cat,'sub_cat' => $sub_cat,'chapter' => $chapter,'topic' => $topic])

@endsection