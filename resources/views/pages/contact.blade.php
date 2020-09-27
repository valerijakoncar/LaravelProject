@extends("template")
@section("title")
    Contact
@endsection
@section("mainContent")
<div id="wrapper">
    <div id="contact">
        <h2 id="headlineAdmin">Contact Admin</h2>
        <div id="contentAdmin">
            <div id="adm">
                Please feel free to contact our sweet admin if you have any trouble or have suggestions for better
                perfomance of our website! :)
                <div><img src="{{ asset('images/h.png') }}" alt="hodor" id="cute"/></div>
            </div>
            <form id="contactAdmin" action="#" method="post">
                @csrf
                <input type="text" id="emailAddress" name="emailAddress" placeholder="Your email address.." value="@if(session()->has('user')) {{ session('user')->email }} @endif "/><br/>
                <textarea id="body" name="body" placeholder="Body.."></textarea><br/>
                <input type="submit" value="SEND" id="sendAdmin"/>
                <p class="success"></p>
                <p class="error"></p>
            </form>
        </div>
    </div>
</div>
    @endsection
