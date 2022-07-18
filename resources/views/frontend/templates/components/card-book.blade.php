<div class="col s12 m6">
    <div class="card horizontal hoverable" style="height: 280px; overflow: auto;">
        <div class="card-image" style="height: 280px; width: 175px">
            <img src="{{ asset($book->getCover()) }}" style="height: 100%" width="100%">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <span class="card-title">
                    <h6><a href="{{ route('book.show', $book) }}">{{ Str::limit($book->title, 40) }}</a></h6>
                    <hr>
                </span>
                <p class="card-description">{{ Str::limit($book->description, 90) }}</p>
            </div>
            <div class="card-action">
                <form action="{{ route('book.borrow', $book) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn cyan lighten-1 right waves-effect waves-light">Pinjam Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>

