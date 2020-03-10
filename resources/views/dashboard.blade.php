@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                    Your Budgets: <br>
                    {{-- @foreach ($budgets as $budget)
                        <a href="/">{{$budget->name}}</a> <br>
                    @endforeach --}}

                    @forelse($categories as $category)
                        <strong>{{ $category->name }}</strong><br>
                        {{ $budgets[$category->name][$loop->index]->name }} <br><br>
                    @empty
                        <p>You don't have any budgets.</p>
                    @endforelse

                    {{-- <a href=""><span>Create a New Budget</span></a> --}}
                    <form action="{{ route('budgets.store') }}" method="POST">
                        @csrf
                        <input type="text" name="budget_name" id="budget_name"><br>
                        <textarea name="budget_desc" id="budget_desc" cols="30" rows="10"></textarea><br>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
