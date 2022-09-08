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
    </style>
    {{ json_encode($data['questionslist'][$question_no]) }}

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-center">
                    <a class="link text-decoration-underline" wire:click.prevent="statusChange()" data-bs-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
                        Directions
                    </a>

                </h5>
              @if ($status == true)
                <div class="card card-body border-0" style="margin-top:-20px">
                 <div class="col-8 mx-auto" style="font-size: 14.5px">
                    Some placeholder content for the collapse component. This panel is hidden by default but
                    revealed when the user activates the relevant trigger.
                 </div>
                </div>
              @endif

                <form id="regForm" style="margin-top:-30px">
                    <div class="tab curent">
                        <div class="d-grid gap-2 mt-4 box-shadows">
                            <h4 class="question">Q-{{ $question_no + 1 }}. {!! $data['questionslist'][$question_no]['question'][0]['Questionin'] !!}</h4>

                            <div class="btn">
                                <button type="button" class="mt-1 active"
                                    wire:click.prevent="onSelect({{ 1 }})">
                                    <label class="radio-custom-label">
                                        {!! $data['questionslist'][$question_no]['question'][0]['option1'] !!}
                                    </label>
                                </button>
                            </div>
                            <div class="btn">
                                <button type="button" class="mt-1 active"
                                    wire:click.prevent="onSelect({{ 2 }})">
                                    <label class="radio-custom-label">
                                        {!! $data['questionslist'][$question_no]['question'][0]['option2'] !!}
                                    </label>
                                </button>
                            </div>
                            <div class="btn">
                                <button type="button" class="mt-1 active"
                                    wire:click.prevent="onSelect({{ 3 }})">
                                    <label class="radio-custom-label">
                                        {!! $data['questionslist'][$question_no]['question'][0]['option3'] !!}
                                    </label>
                                </button>
                            </div>
                            <div class="btn">
                                <button type="button" class="mt-1 active"
                                    wire:click.prevent="onSelect({{ 4 }})">
                                    <label class="radio-custom-label">
                                        {!! $data['questionslist'][$question_no]['question'][0]['option4'] !!}
                                    </label>
                                </button>
                            </div>
                        </div>
                    </div>



                    <div style="overflow:auto;">
                        <div style="float:right;">
                            @if ($question_no != 0)
                                <button type="button" class="me-2" id="prevBtn" type="button"
                                    wire:click.prevent="prev()">Previous</button>
                            @endif

                            {{-- {{ $question_no }}{{ count($data['questionslist']) }} --}}

                            @if ($question_no == count($data['questionslist']) - 1)
                                <button class="education-btn btn-medium" wire:click.prevent="onSubmit()" type="button"
                                    id="nextBtn">
                                    Submit</button>
                            @else
                                <button class="education-btn btn-medium" wire:click.prevent="next()" type="button"
                                    id="nextBtn">Save &
                                    Next</button>
                            @endif
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->

                </form>
            </div>

            <div class="col-lg-4 p-5" style="background-color: #f0f0f0">
                <div class="user-attempt-question">
                    <div class="user-profile mb-3">

                        <div class="left-right " style="flex-grow: 1">
                            <div class="time-section">
                                <span>Time Left : <b id="countdown">{{ $min }}: {{ $sec }}</b></span>
                            </div>

                        </div>
                        <div class="text-light btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <span style="font-size: 14px">
                            Language
                            </span>
                        </div>
                        
                    </div>


                    <div class="quition-number-plate">
                        <h4>Your are Viewing LR Section Question Palltte:</h4>
                        <div class="quition-no-box-section">
                            @foreach ($data['questionslist'] as $item)
                                @if ($item['s'] == 'false')
                                    <a wire:click.prevent="jump({{ $loop->index }})"><span
                                            style="background: #9e9e9e;">{{ $loop->index + 1 }}</span></a>
                                @else
                                    @if (empty($item['optSel']))
                                        <a wire:click.prevent="jump({{ $loop->index }})"><span
                                                style="background: #d70b0b;">{{ $loop->index + 1 }}</span></a>
                                    @else
                                        <a wire:click.prevent="jump({{ $loop->index }})"><span
                                                style="background: #3ca440;">{{ $loop->index + 1 }}</span></a>
                                    @endif
                                @endif
                            @endforeach
                      </div>
                    </div>
                    <div class="legent-section">
                        <h4>Legend</h4>
                        <div class="answerd">
                            <div class="answer-box">
                                <p><span style="background: #3ca440;"> {{ $a }}</span>Answered</p>
                                <p><span style="background: #d70b0b;">{{ $w }}</span> Not Answered</p>
                            </div>
                            <div class="answer-box">
                                <p><span style="background: #9e9e9e;">{{ $u }}</span> Not Visited</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        setInterval(updateCountDown, 1000)

        function updateCountDown() {
            Livewire.emit('totaltime');
        }
    </script>
    {{-- <script>
        // Livewire.emit('')
        const min = 10;
        let time = min * 60;
        let initialTime = time;
        const countdownDel = document.getElementById('countdown')

        setInterval(updateCountDown, 1000)
        // setInterval(calculateTime, 1000)
        
        function updateCountDown() {
            // Livewire.emit('totaltime')
            let minutes = Math.floor(time / 60);
            let sec = time % 60;
            sec = sec >= 10 ? sec : "0" + sec;

            countdownDel.innerHTML = `${minutes} : ${sec}`
            
            // console.log(time +" " +sec)
        }

        // function calculateTime() {
        //     let timeTaken = initialTime - time;
        //     console.log(timeTaken);
        //     initialTime = time;
        //     Livewire.emit('timetaken',$timeTaken)
        // }
    </script> --}}

</div>
