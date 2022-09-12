@extends('user.dashboard')
@section('pscmithra')

    <div class="quize-page">
        <div class="container">
             @livewire('user.quiz-attempt-start', ['testId' => $data['testId'], 'examinationId' => $data['examinationId']])
        </div>
    </div>

    @endsection