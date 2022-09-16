<div>

    <div class="row mt-1">
        <div class="col position-relative">
            <label for="" class="form-label">Type</label>
            <select wire:model="planType" name="type" id="" class="form-select" required>
                <option value="">Select Type</option>
                <option value="book">Book</option>
                <option value="course">Course</option>
                <option value="pdf">Pdf</option>
                <option value="plan">Plan</option>
                <option value="ebook">Ebook</option>
            </select>
            <div class="valid-tooltip">
                Looks good!
            </div>
        </div>
        @if(!empty($planType))
        @if(($planType == 'course') ||($planType == 'ebook'))
        <div class="col position-relative">
            <label for="validationTooltip01" class="form-label">Time Duration</label>
            <input type="number" class="form-control" name="time" id="validationTooltip01" required>
            <div class="valid-tooltip">
                Looks good!
            </div>

        </div>
        <div class="col position-relative">
            <label for="" class="form-label">Select Unit</label>
            <select name="timetype" id="" class="form-select" required>
                <option value="Days">Days</option>
                <option value="Months">Month</option>
                <option value="Years">Year</option>

            </select>
            <div class="valid-tooltip">
                Looks good!
            </div>
        </div>
        @endif
        @endif
    </div>
    <div>
        @if(!empty($planType))
        @if($planType == 'plan')
        <livewire:exam />
        @else
        <h5 class="card-title">Select {{$planType}}</h5>
        <div class="table-responsive" style="white-space: nowrap;">

            <!-- Table with stripped rows -->
            <table class="datatable table" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($list as $value)
                    <tr>
                        <td><input type='checkbox' class="radio" value='{{$value->id}}' name='data'></td>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <!-- End Table with stripped rows -->
        </div>
    </div>


    


    @endif
    <script>
        $(document).ready(function() {
            $('#example').DataTable({

            });
        });


        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });


        Dropzone.autoDiscover = false;
  
        var dropzone = new Dropzone('#image-upload', {
              thumbnailWidth: 200,
              maxFilesize: 1,
              acceptedFiles: ".jpeg,.jpg,.png,.gif"
            });
    </script>
    @endif

</div>

</div>