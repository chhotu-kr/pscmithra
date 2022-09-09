@extends('user.dashboard')
@section('pscmithra')

    <div class="quize-page">
        <div class="container">
               @livewire('user.live-quiz-solution',['testid' => $testid ,'examinationId' => $examinationId])
        </div>
    </div>

    @endsection
