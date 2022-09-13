<div>
    {{-- {{ json_encode($data) }} --}}
    <div>
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
                z-index: 00;
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
                transform: rotate(<?php echo $data['percentage'] * 1.8 ?>deg);
            }
    
            @keyframes fill {
                0% {
                    transform: rotate(0deg);
                }
    
                100% {
                    transform: rotate(<?php echo $data['percentage'] * 1.8 ?>deg);
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
                                <div class="inside-circle"> {{ $data['percentage'] }}% </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="boxdiv rounded-pill mt-2" style="background-color: #42e7c3">
                            <span class="badge p-3 rounded-pill bg-success mt-1 ms-3">{{ $data['right'] }}</span>
                            <span class="text-white ms-3">Correct</span>
                        </div>
                        <div class="boxdiv rounded-pill mt-2" style="background-color: #ffe2e4">
                            <span class="badge p-3 rounded-pill bg-danger mt-1 ms-3">{{ $data['wrong'] }}</span>
                            <span class="text-danger ms-3">Wrong</span>
                        </div>
                        <div class="boxdiv rounded-pill mt-2" style="background-color: #f1ebeb">
                            <span class="badge p-3 rounded-pill bg-secondary mt-1 ms-3">{{ $data['skip'] }}</span>
                            <span class="text-secondary ms-3">Unanswered</span>
                        </div>
                    </div>
                </div>
    
                <div class="row" style="margin-top: -50px">
                    <div class="col-12 text-center">
                        <a >
                        <h3 class="text-primary">Answer Key & Solution</h3>
                        </a>
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
                            <h6>{{$data['score']}}</h6>
                            <p style="margin-top: -20px">Score</p>
                        </div>
    
                    </div>
                    <div class="col-3 col-md-1 align-items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <div>
                            <h6>{{$data['noQues']}}</h6>
                            <p style="margin-top: -20px">No of Question</p>
                        </div>
    
                    </div>
                    <div class="col-3 col-md-1 align-items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <div>
                            <h6>{{$data['time'] / 60  }}min</h6>
                            <p style="margin-top: -20px">total time</p>
                        </div>
    
                    </div>
                    <div class="col-3 col-md-1 align-items-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <div>
                            <h6>{{ $data['timeTaken'] }}</h6>
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
                    <h6 class="mt-4">Question Analytics</h6>
                    <div>
    
                        {{-- {{ json_encode($data['questionslist'][$this->question_no]) }} --}}
                        <style type="text/css">
                            .flex {
                                display: flex;
                            }
    
                            .quize-page {
                                padding: 50px 0;
                                position: relative;
                            }
    
                            /* .quize-page:before {
                                    content: '';
                                    position: absolute;
                                    width: 37%;
                                    height: 100%;
                                    background: #f0f0f0;
                                    z-index: -1;
                                    top: 0;
                                    right: 0;
                                } */
    
                            #regForm {
                                background-color: #ffffff;
                                padding: 20px;
                            }
    
                            #regForm h1 {
                                text-align: left;
                                font-size: 22px;
                            }
    
    
                            /* Mark input boxes that gets an error on validation: */
                            input.invalid {
                                background-color: #ffdddd;
                            }
    
                            /* Hide all steps by default: */
                            .tab {
                                display: contents;
                                border: 1px solid #dbd6e0;
                                padding: 10px;
                                margin-bottom: 15px;
                            }
    
                            #prevBtn {
                                background-color: #4c7bcd;
                                border: 0;
                                height: 50px;
                                border-radius: 5px;
                                color: #fff;
                                padding: 0 20px;
                            }
    
                            /* Make circles that indicate the steps of the form: */
                            .step {
                                height: 15px;
                                width: 15px;
                                margin: 0 2px;
                                background-color: #bbbbbb;
                                border: none;
                                border-radius: 50%;
                                display: inline-block;
                                opacity: 0.5;
                            }
    
                            .step.active {
                                opacity: 1;
                            }
    
                            /* Mark the steps that are finished and valid: */
                            .step.finish {
                                background-color: #04AA6D;
                            }
    
    
                            p.quition-para {
                                color: #000;
                                font-size: 18px;
                                margin-bottom: 10px;
                            }
    
    
                            .user-profile {
                                display: flex;
                            }
    
                            .user-profile .left-user img {
                                width: 90px;
                                margin-right: 20px;
                            }
    
                            .user-attempt-question {
                                padding-left: 20px;
                            }
    
                            .user-attempt-question .left-right h4 {
                                margin: 0;
                                margin-top: 18px;
                            }
    
                            .legent-section {
                                margin-top: 20px;
                            }
    
    
    
                            .legent-section .answerd .answer-box {
                                display: flex;
                                justify-content: space-between;
                            }
    
                            .legent-section .answerd .answer-box p {
                                width: 49%;
                                margin: 0;
                                background: #4c7bcd;
                                margin-bottom: 10px;
                                padding: 6px;
                                color: #fff;
                                border-radius: 5px;
                                text-align: center;
                                position: relative;
                            }
    
                            .legent-section .answerd .answer-box p span {
                                width: 30px;
                                display: inline-block;
                                position: absolute;
                                left: 0;
                                top: 0;
                                height: 38px;
                                line-height: 38px;
                            }
    
    
    
                            .quition-no-box-section {
                                height: 185px;
                                overflow: auto;
                            }
    
                            .quition-no-box-section span {
                                background: #2196f3;
                                width: 40px;
                                display: inline-block;
                               margin: 10px 20px;
                                height: 40px;
                                line-height: 40px;
                                text-align: center;
                                color: #fff;
                            }
    
                            .four-btn {
                                margin-top: 20px;
                                border-top: 1px solid #dcd1d1;
                                padding-top: 10px;
                            }
    
                            .four-btn a {
                                width: 49%;
                                border: 2px solid #00b0ff;
                                margin-bottom: 10px;
                                text-align: center;
                                padding: 5px;
                                color: #fff;
                                text-transform: uppercase;
                                font-weight: 600;
                                background: #0595d6;
                            }
    
                            .option label {
                                font-size: var(--font-size-b1);
                                line-height: var(--line-height-b1);
                                font-weight: 400;
                                color: white;
                                margin: 0 0 0px !important;
                            }
    
                            .btn-group-vertical.special {
                                display: flex;
                            }
    
                            .special .btn {
                                /* background-color: #787575; */
                                flex: 1
                            }
    
                            button:active::before {
                                background-color: #dd4814;
                            }
    
    
    
                            .active:focus {
                                background-color: #E3F2FD;
    
                            }
    
                            .active {
    
                                width: 100%;
                                border: 1px solid grey;
                                border-radius: 10px;
                                background-color: white;
                                color: black;
                                display: flex
                            }
    
                            .active p {
                                color: black;
                                align-items: flex-start
                            }
    
                            .box-shadows {
                                box-shadow: none;
                                padding: 10px;
                                margin-bottom: 30px;
                                border: 1px solid #e5dfdf;
                            }
    
    
                            .radio-custom,
                            .radio-custom-label {
                                display: inline-block;
                                vertical-align: middle;
                                margin: 5px;
                                cursor: pointer;
                                font-size: var(--font-size-b1);
                            }
    
                            .accordion {
                                margin-bottom: 30px;
                            }
    
                            .according_tab .card-header button {
                                border: 0;
                                font-size: 18px;
                                text-decoration: none;
                                color: #000;
                                padding: 0;
                            }
    
                            .card-header {
                                padding: 0 10px;
                            }
    
    
    
                            .solutions p {
                                font-size: 18px;
                                color: #000;
                            }
    
                            .option-label {
                                background-color: #000;
                                color: white;
                                border-radius: 100%;
                                width: 26px;
    
                            }
                        </style>
    
    
                        <div class="container">
                            <div class="row">
                                {{-- <div class="col-md-8">
                                    <h5 class="text-center">
                                        <a class="link text-decoration-underline" data-bs-toggle="collapse"
                                            href="#collapseExample" role="button" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Directions
                                        </a>
    
                                    </h5> --}}
                                    {{-- @if ($status == true)
                                        <div class="card card-body border-0" style="margin-top:-20px">
                                            <div class="col-8 mx-auto" style="font-size: 14.5px">
                                                Some placeholder content for the collapse component. This panel is hidden by default but
                                                revealed when the user activates the relevant trigger.
                                            </div>
                                        </div>
                                    @endif --}}
    
                                    {{-- <form id="regForm" style="margin-top:-30px">
                                        <div class="tab curent">
                                            <div class="d-grid gap-2 mt-4 box-shadows">
                                                <h4 class="question">Q-1.nsdkjdwkjhk,js,dw</h4>
    
                                                <div class="btn">
                                                    <button type="button" class="mt-1 active">
                                                        <div class="option-label">
                                                            <label for="" class="radio-custom-label ">
                                                                A
                                                            </label>
                                                        </div>
                                                        <label class="radio-custom-label ms-4">
                                                            anbsn sd
                                                        </label>
                                                    </button>
                                                </div>
                                                <div class="btn">
                                                    <button type="button" class="mt-1 active">
                                                        <div class="option-label">
                                                            <label for="" class="radio-custom-label ">
                                                                B
                                                            </label>
                                                        </div>
                                                        <label class="radio-custom-label ms-4">
                                                            adbnads
                                                        </label>
                                                    </button>
                                                </div>
                                                <div class="btn">
                                                    <button type="button" class="mt-1 active">
                                                        <div class="option-label">
                                                            <label for="" class="radio-custom-label ">
                                                                C
                                                            </label>
                                                        </div>
                                                        <label class="radio-custom-label ms-4">
                                                            bsk
                                                        </label>
                                                    </button>
                                                </div>
                                                <div class="btn">
                                                    <button type="button" class="mt-1 active">
                                                        <div class="option-label">
                                                            <label for="" class="radio-custom-label ">
                                                                D
                                                            </label>
                                                        </div>
                                                        <label class="radio-custom-label ms-4">
                                                             jhskhbd
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
    
    
    
                                        <div style="overflow:auto;">
                                            <div style="float:right;">
    
                                                <button type="button" class="me-2" id="prevBtn"
                                                    type="button">Previous</button>
    
    
    
    
                                                <button class="education-btn btn-medium" type="button" id="nextBtn">
                                                    Next</button>
                                            </div>
                                        </div>
                                        <!-- Circles which indicates the steps of the form: -->
    
                                    </form>
                                </div>
     --}}
                                <div class="col-lg-12 p-5" style="background-color: #f0f0f0">
                                    <div class="user-attempt-question">
                                        <div class="user-profile mb-3">
    
                                            <div class="left-right " style="flex-grow: 1">
                                                <div class="time-section">
                                                    <h6>Time Taken : <b id="countdown">{{floor( $data['timeTaken'] / 60) }} min : {{ $data['timeTaken'] % 60 }}sec</b></h6>
                                                </div>
    
                                            </div>
                                            <div class="text-light btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop" style="height: 33px">
                                                <span style="font-size: 14px">
                                                    Language
                                                </span>
                                            </div>
    
                                        </div>
    
    
                                        <div class="quition-number-plate">
                                            <h5 class="text-secondary">Your are Viewing LR Section Question Palltte:</h5>
                                            <div class="quition-no-box-section">
                                                @foreach ($data['questionslist'] as $item)
                                                    @if ($item['final'] == 'unseen')
                                                        <a ><span
                                                                style="background:  {{ $item['color'] }}">{{ $loop->index + 1 }}</span></a>
                                                    @else
                                                        @if ($item['final'] == 'wrong')
                                                            <a ><span
                                                                    style="background: {{ $item['color'] }};">{{ $loop->index + 1 }}</span></a>
                                                        @else
                                                            <a ><span
                                                                    style="background: {{ $item['color'] }};">{{ $loop->index + 1 }}</span></a>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="legent-section">
                                            <h4>Legend</h4>
                                            <div class="answerd">
                                                <div class="answer-box">
                                                    <p><span style="background: #3ca440;"> {{ $data['right'] }}</span>Rigth Answered</p>
                                                    <p><span style="background: #d70b0b;">{{ $data['wrong'] }}</span> Wrong Answered</p>
                                                </div>
                                                <div class="answer-box">
                                                    <p><span style="background: #9e9e9e;">{{ $data['unseen'] }}</span> Not Visited</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
    
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>
    
</div>
