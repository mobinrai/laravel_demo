<form action="{{route('books.review')}}" method="POST" id="book_review">
    @csrf
    <input type="hidden" name="book" value="{{$bookDetail->id}}">
    <div class="form-group">
        <label for="message">Your Review *</label>
        <textarea id="message" cols="30" name="comments" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="name">Your Name *</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
    </div>
    <div class="form-group">
        <label for="email">Your Email *</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email">
    </div>
    <div class="form-group mb-0">
        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
    </div>
</form>