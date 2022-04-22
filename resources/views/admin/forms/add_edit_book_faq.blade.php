@include('admin.forms.validation_error')
<div class="mb-3">
    <label class="form-label" for="book">Book</label>
    <select name="book" id="book" class="form-select">
        <option value="">select book</option>
        @php $book_id = old('book')?old('book'):$bookFaq->book_id @endphp
        @foreach ($books as $item)
            <option value="{{$item->id}}" @if($book_id == $item->id) {{'selected'}} @endif>{{$item->title}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label" for="question">Question</label>
    <input class="form-control" id="question" name="question" value="{{old('question')?old('question'):$bookFaq->question}}"
        type="text" placeholder="enter question">
</div>
<div class="mb-3">
    <label class="form-label" for="answer">Answer</label>
    <input class="form-control" id="answer" name="answer" value="{{old('answer')?old('answer'):$bookFaq->answer}}"
        type="text" placeholder="enter answer">
</div>