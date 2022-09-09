@extends('user.dashboard')
@section('pscmithra')
    @livewire('user.quiz-result',['testid' => $testid,'quizexaminationid' => $quizexaminationid])
@endsection
