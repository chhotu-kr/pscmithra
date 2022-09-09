@extends('user.dashboard')
@section('pscmithra')
    @livewire('user.live-quiz-result',['testid' => $testid,'examinationId' => $examinationId])
@endsection
