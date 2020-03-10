<p>Budgets:</p>
<ul>
    @foreach ($budgets as $budget)
        <li><a href="{{route('budgets.show', [$budget])}}">{{ $budget->name }}</a></li>
    @endforeach

    @forelse ($categories as $category)
    {{$category->name}} <br>
        @foreach ($budgets as $budget)
            @if($budget->budget_category_id == $category->id)
                <li><a href="{{route('budgets.show', [$budget])}}">{{ $budget->name }}</a></li>
            @endif
        @endforeach
    @empty
        <p>You dont have any budgets.</p>
    @endforelse
</ul>
