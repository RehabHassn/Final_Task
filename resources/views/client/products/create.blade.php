@extends('layout')
@section('title','Products')
@section('content')
    @section("content")
        @if (session()->has('message'))

            <p class="alert alert-success">{{session('message')}}</p>

        @endif
    <form action="{{ route('products.store') }}" method="POST" class="container mt-5">
        @csrf
        <div class="form-group mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" id="productName" name="name" class="form-control" placeholder="Enter Product Name">
        </div>

        <div class="form-group mb-3">
            <label for="categorySelect" class="form-label">Category</label>
            <select name="category_id" id="categorySelect" class="form-select" onchange="loadQuestions()">
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="questions" class="mb-3"></div>

        <button type="submit" class="btn btn-primary">Add Product</button>
        @endsection

        @section('scripts')
        <script>
        {{--    let categories = @json($categories);--}}

        {{--    function loadQuestions() {--}}
        {{--        let categoryId = document.getElementById('categorySelect').value;--}}
        {{--        let questions = categories.find(cat => cat.id == categoryId)?.questions || [];--}}

        {{--        let html = '';--}}
        {{--        questions.forEach(question => {--}}
        {{--            html += `--}}
        {{--    <div class="form-group mb-3">--}}
        {{--        <label class="form-label">${question.question}</label>--}}
        {{--        ${getInputField(question)}--}}
        {{--    </div>--}}
        {{--`;--}}
        {{--        });--}}

        {{--        document.getElementById('questions').innerHTML = html;--}}
        {{--    }--}}

        {{--    function getInputField(question) {--}}
        {{--        switch (question.type) {--}}
        {{--            case 'text':--}}
        {{--                return `<input type="text" name="answers[${question.id}]" class="form-control" placeholder="Enter Answer">`;--}}
        {{--            case 'date':--}}
        {{--                return `<input type="date" name="answers[${question.id}]" class="form-control">`;--}}
        {{--            case 'select':--}}
        {{--                return `<select name="answers[${question.id}]" class="form-select"><!-- Add Options --></select>`;--}}
        {{--        }--}}
        {{--    }--}}
        </script>
    @endsection
