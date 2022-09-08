@extends('user.dashboard')
@section('pscmithra')
    <style>
        .boxdiv {
            height: 35px;
            width: auto;
            background-color: #00a884;
        }

        .badgediv {
            width: 40px;
            background-color: green;
            padding: 5px
        }

        .circle-wrap {
            margin: 150px auto;
            width: 150px;
            height: 150px;
            background: #fefcff;
            border-radius: 50%;
            border: 1px solid #cdcbd0;
            margin-top: 0px;
        }

        .circle-wrap .circle .mask,
        .circle-wrap .circle .fill {
            width: 150px;
            height: 150px;
            position: absolute;
            border-radius: 50%;
        }

        .circle-wrap .circle .mask {
            clip: rect(0px, 150px, 150px, 75px);
        }

        .circle-wrap .inside-circle {
            width: 122px;
            height: 122px;
            border-radius: 50%;
            background: #d2eaf1;
            line-height: 120px;
            text-align: center;
            margin-top: 14px;
            margin-left: 14px;
            color: #1e51dc;
            position: absolute;
            z-index: 100;
            font-weight: 700;
            font-size: 2em;
        }

        /* color animation */

        /* 3rd progress bar */
        .mask .fill {
            clip: rect(0px, 75px, 150px, 0px);
            background-color: #227ded;
        }

        .mask.full,
        .circle .fill {
            animation: fill ease-in-out 3s;
            transform: rotate(135deg);
        }

        @keyframes fill {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(135deg);
            }
        }
    </style>
    <div class="quize-page mt-5">
        <div class="container">
            <div class="row">
                <h6>Overview</h6>
                <div class="col-6">
                    <div class="circle-wrap">
                        <div class="circle">
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
                            <div class="mask half">
                                <div class="fill"></div>
                            </div>
                            <div class="inside-circle"> 75% </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="boxdiv rounded-pill mt-2" style="background-color: #42e7c3">
                        <span class="badge p-3 rounded-pill bg-success mt-1 ms-3">2</span>
                        <span class="text-white ms-3">Correct</span>
                    </div>
                    <div class="boxdiv rounded-pill mt-2" style="background-color: #ffe2e4">
                        <span class="badge p-3 rounded-pill bg-danger mt-1 ms-3">2</span>
                        <span class="text-danger ms-3">Wrong</span>
                    </div>
                    <div class="boxdiv rounded-pill mt-2" style="background-color: #f1ebeb">
                        <span class="badge p-3 rounded-pill bg-secondary mt-1 ms-3">4</span>
                        <span class="text-secondary ms-3">Unanswered</span>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top: -50px">
                <div class="col-12 text-center">
                    <h3 class="text-primary">Answer Key & Solution</h3>
                </div>
            </div>
            <div class="row">
                <h6>Analytics</h6>
                <div class="col-3 col-md-1 align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    <div>
                        <h6>-82.22</h6>
                        <p style="margin-top: -20px">Score</p>
                    </div>

                </div>
                <div class="col-3 col-md-1 align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    <div>
                        <h6>-82.22</h6>
                        <p style="margin-top: -20px">per Qusetiopn</p>
                    </div>

                </div>
                <div class="col-3 col-md-1 align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    <div>
                        <h6>-82.22</h6>
                        <p style="margin-top: -20px">total time</p>
                    </div>

                </div>
                <div class="col-3 col-md-1 align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    <div>
                        <h6>-82.22</h6>
                        <p style="margin-top: -20px"> time taken</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <h6 style="margin-top: -0px">Ranking</h6>
                <div class="col-6 mx-auto">
                    <h3 class=" text-center  text-danger">
                        Don't Give Up
                    </h3>
                </div>
                <div class="col-12">
                    Lorem,<span class="text-dark"> ipsum dolor sit amet consectetur adipisicing elit. Similique cum iusto
                        nam quisquam ipsa pariatur natus. Est sit sint a labore fugit odit rem voluptatum quis architecto
                        pariatur. Nihil, odio!</span>
                </div>
            </div>
            <div class="row mt-5">
                <h6 class="mt-4">Qusetion Analytics</h6>

            </div>

        </div>
    </div>
@endsection
