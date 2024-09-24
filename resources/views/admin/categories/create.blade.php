@extends('layout')
@section('title','Categories')
@section('content')
    @if (session()->has('message'))

        <p class="alert alert-success">{{session('message')}}</p>

    @endif
<form action="{{ route('categories.store') }}" method="POST" class="container mt-5">
    @csrf
    <div class="form-group mb-3">
        <label for="categoryName" class="form-label">Category Name</label>
        <input type="text" id="categoryName" name="name" class="form-control" placeholder="Enter Category Name">
    </div>

    <div id="questions">
        <div class="question row mb-3">
            <div class="col-md-6">
                <label for="question0" class="form-label">Question</label>
                <input type="text" id="question0" name="questions[0][question]" class="form-control" placeholder="Enter Question">
            </div>
            <div class="col-md-3">
                <label for="type0" class="form-label">Type</label>
                <select id="type0" name="questions[0][type]" class="form-select">
                    <option value="text">Text</option>
                    <option value="date">Date</option>
                    <option value="select">Select</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check">
                    <input type="checkbox" id="required0" name="questions[0][is_required]" class="form-check-input" value="1">
                    <label for="required0" class="form-check-label">Required</label>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="addQuestion()">Add Question</button>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </div>
</form>
@endsection
<script>
    let questionIndex = 1;
    function addQuestion() {
        let html = `
            <div class="question row mb-3">
                <div class="col-md-6">
                    <label for="question${questionIndex}" class="form-label">Question</label>
                    <input type="text" id="question${questionIndex}" name="questions[${questionIndex}][question]" class="form-control" placeholder="Enter Question">
                </div>
                <div class="col-md-3">
                    <label for="type${questionIndex}" class="form-label">Type</label>
                    <select id="type${questionIndex}" name="questions[${questionIndex}][type]" class="form-select">
                        <option value="text">Text</option>
                        <option value="date">Date</option>
                        <option value="select">Select</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" id="required${questionIndex}" name="questions[${questionIndex}][is_required]" class="form-check-input" value="1">
                        <label for="required${questionIndex}" class="form-check-label">Required</label>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('questions').innerHTML += html;
        questionIndex++;
    }
</script>
