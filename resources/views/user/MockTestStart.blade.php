@extends('user.dashboard')
@section('pscmithra')
    {{-- {{ dd($data['examinationId']) }} --}}

    {{-- @livewire('user.mocktest-start', ['testId' => $data['testId'], 'examinationId' => $data['examinationId']]) --}}

    <style type="text/css">
        .quize-page {
            padding: 50px 0;
            position: relative;
        }

        .quize-page:before {
            content: '';
            position: absolute;
            width: 37%;
            height: 100%;
            background: #f0f0f0;
            z-index: -1;
            top: 0;
            right: 0;
        }

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
            display: block;
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

        .quize-page [type="radio"]:checked+label:after {
            background-color: #4c7bcd;
            width: 100%;
            height: 100%;
            border-radius: 0;
            left: 0;
            top: 0;
            z-index: -1;
            color: #fff;

        }

        .quize-page input[type="radio"]~label::before {
            border: 1px solid #dcdfe0;
            border-radius: 50%;
            opacity: 0;
        }

        p.quition-para {
            color: #000;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .quize-page .tab .form-group label {
            width: 100%;
            position: relative;
            z-index: 1;
            padding: 5px 0 5px 10px;
            color: #fff;
            background: #787575;
        }

        .quize-page .tab .form-group {
            margin-bottom: 20px;
            border: 1px solid #d5cfcf;
            position: relative;
        }

        .quize-page .quition-no h5 {}

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

        .legent-section .answerd {}

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

        .quition-number-plate {}

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
    </style>


    <div class="quize-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @livewire('user.mocktest-start', ['testId' => $data['testId'], 'examinationId' => $data['examinationId']])

                </div>
                <div class="col-lg-4">
                    <div class="user-attempt-question">
                        <div class="user-profile">
                            <div class="left-user">
                                <img src="img/man-avatar-profile1.png">
                            </div>
                            <div class="left-right">
                                <h4>Amit Kumar</h4>
                                <div class="time-section">
                                    <span>Time Left : <b id="countdown">10:20</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="legent-section">
                            <h4>Legend</h4>
                            <div class="answerd">
                                <div class="answer-box">
                                    <p><span style="background: #3ca440;">5</span> Answered</p>
                                    <p><span style="background: #d70b0b;">2</span> Not Answered</p>
                                </div>
                                <div class="answer-box">
                                    <p><span style="background: #ff5722;">50</span> Marked</p>
                                    <p><span style="background: #9e9e9e;">3</span> Not Visited</p>
                                </div>
                            </div>
                        </div>

                        <div class="quition-number-plate">
                            <h4>Your are Viewing LR Section Question Palltte:</h4>
                            <div class="quition-no-box-section">
                                <span>1</span>
                                <span>2</span>
                                <span>3</span>
                                <span>4</span>
                                <span>5</span>
                                <span>6</span>
                                <span>7</span>
                                <span>8</span>
                                <span>9</span>
                                <span>10</span>
                                <span>11</span>
                                <span>12</span>
                                <span>13</span>
                                <span>14</span>
                                <span>15</span>
                                <span>16</span>
                                <span>17</span>
                                <span>18</span>
                                <span>19</span>
                                <span>20</span>
                                <span>21</span>
                            </div>
                        </div>
                        <div class="four-btn">
                            <a href="">Question Paper</a>
                            <a href="">Instructions</a>
                            <a href="">Profile</a>
                            <a href="">Submit</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        const startingMin = 1;
        let time = startingMin * 60;

        const countdownelement = document.getElementById('countdown')
        // console.log(countdownelement)
        setInterval(updatecountdown,1000)

        function updatecountdown(){
            const minutes = Math.floor(time/60);
            let second = time % 60 
            second = second < 10 ? '0' + second : second
            time--;
            countdownelement.innerHTML = `${minutes}: ${second}`
        }
    </script> --}}


    {{-- <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Save & Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script> --}}
@endsection
