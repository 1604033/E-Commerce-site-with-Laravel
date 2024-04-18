<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    All Items 
  </a>
  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                    <a href="{!! route('categories.show', $parent->id) !!}" class="list-group-item list-group-item-action">
                        <img src="{{ asset('image/categories/'. $parent->image)}}" alt="" width="50">{{ $parent->name}}
                    </a>
   @endforeach
  <a href="#" class="list-group-item list-group-item-action">Upcoming Items</a>
  <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled item</a>
</div>