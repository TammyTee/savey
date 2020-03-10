<a href="{{route('budgets.index')}}">Back</a> <br>
{{$budget->name}} <br>
{{$budget->description}} <br>
User: {{auth()->user()->name}}
