@extends("template")
@section("title")
    Author
@endsection
@section("mainContent")
<div id="wrapper">
    <div id="author">
        <h2 id="headlineAuthor">Author</h2>
        <div id="author1">
            <div id="picAuthor"></div>
            <div id="authorAbout">
                <?= $author[0]->text ?>
            </div>

        </div>
    </div>
</div>
    @endsection
