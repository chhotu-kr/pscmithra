@extends('user.dashboard')
@section('pscmithra')
    @livewire('user.quiz-result',['testid' => $testid,'examinationId' => $examinationId])
@endsection
