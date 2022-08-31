<div class="container mt-5 ">
    <div id="tab-1" class="tab-content current">
        <div class="row">
            
          @foreach ($data as $item)
          <div class="col-lg-3 col-md-6">

            <div class="card p-3">
                <div class="card-body">
                    <div class="content">
                        <h5 class="title ">{{ $item["name"] }}</h5>
                        <p>{{ $item['categoryName'] }} | {{ $item['subCategoryName'] }}</p>
                        <ul class="Attempt-sec">
                            <li class="flex ttc mv-0-67 mv-0-50-l "><span>Questions: </span><span
                                    class="ml-auto">{{ $item['totalQues'] }}</span></li>
                            <li class="flex mv-0-67 mv-0-50-l "><span>Max Marks: </span><span
                                    class="ml-auto">{{ $item['totalQues'] }}</span></li>
                            <li class="flex mv-0-67 mv-0-50-l "><span>Time: </span><span class="ml-auto">{{ $item['totalTimeinMints'] }}</span></li>
                        </ul>
                       
                        <a class="education-btn btn-medium w-100"
                            wire:click.prevent="checkLogin('{{ $item['id'] }}')">Attempt<i class="icon-4"></i></a>
                    </div>
                </div>
            </div>
        </div>
          @endforeach
        </div>
    </div>
</div>
