<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="col-lg-12">

        @foreach ($quizcategory as $item)
       @livewire('quiz-cate', ["id"=>$item['id'],"Name"=>$item['name']] ,key($item['id']))
        @endforeach
     </div>
 
</div>
