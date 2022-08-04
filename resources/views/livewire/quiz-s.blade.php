<div>
   
    <div class="col-lg-12">

        @foreach ($quizsubcategories as $item)
       @livewire('quiz-sub-cate', ["id"=>$item['id'],"Name"=>$item['name']] ,key($item['id']))
        @endforeach
     </div>
</div>
