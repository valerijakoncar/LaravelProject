<body>
<form enctype="multipart/form-data" name="insertForm" id="insertForm"
      method="POST" action="{{ url('/insertProd') }}" onsubmit="return checkInsert();">
    @csrf
    <span class="fa fa-close"></span>
    <input type="text" id="prodNameI" name="prodNameI" placeholder="Product name"/><br/>
    <select id="prodCatI" name="prodCatI">
        <option value="-1">Choose category..</option>
        @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
     @endforeach
    </select><br/>
    <label>Product price:</label><input type="text" id="prodPriceI" name="prodPriceI" placeholder="Dish price"/><br/>
    <label>Product old price:</label><input type="text" id="oldPriceI" name="oldPriceI" placeholder="Regular price"/><br/>
    <select id="hotProdI" name="hotProdI">
        <option value="0">Not hot</option>
        <option value="1">Hot</option>
    </select><br/>
    <label>Product image:</label><input type="file" name="imgProdI" id="imgProdI"/><br/>
    <p class="error"></p>
    <input type="submit" value="Insert" id="proceedIns" name="proceedIns"/>
</form>
<form enctype="multipart/form-data" name="updateForm" id="updateForm"
      method="POST" action="{{ url('/updateProd') }}" onsubmit="return checkUpdate();">
    @csrf
    <span class="fa fa-close"></span>
    <input type="hidden" id="idProd" name="idProd"/>
    <input type="text" id="prodName" name="prodName" placeholder="Product name"/><br/>
    <select id="prodCat" name="prodCat">
        <option value="-1">Choose category..</option>
        @foreach($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select><br/>
    <label>Product price:</label><input type="text" id="prodPrice" name="prodPrice" placeholder="Product price"/><br/>
    <label>Product old price:</label><input type="text" id="oldPrice" name="oldPrice" placeholder="Product old price"/><br/>
    <select id="hotProd" name="hotProd">
        <option value="0">Not hot</option>
        <option value="1">Hot</option>
    </select><br/>
    <label>Product image:</label><input type="file" name="imgProd" id="imgProd"/><br/>
    <p class="error">
        <br/>
        @isset($errors)
            @foreach($errors->all() as $err)
                {{ $err }} <br/>
                @endforeach
            @endisset
    </p>
    <p class="success"> </p>
    <input type="submit" value="Update" id="proceedUpd" name="proceedUpd"/>
</form>
<div id="wrapper">
    <div id="helloUsername">
        <?php if(isset($activities)){ ?>
            <a id="back" href='{{ url("/admin") }}'><span class="fa fa-arrow-left"></span>Back</a>
        <?php } ?>
        <a href='{{ url("/logout") }}'><span class="fa fa-sign-out"></span></a>
        <p id="helloAdmin">Hello
            @if(session()->has('user'))
                @if(session('user')->role_id == 1)
                    {{ session('user')->username }}
                    @endif
            @endif
            !&nbsp;<span class='fa fa-star-o'></span></p>
        <div id="menuAdminDiv">
            <ul id="menuAdmin">
                <?php if(!isset($activities)){ ?>
                @foreach($adminMenu as $am)
                    @if($am->text != 'Activity')
                        <li><a href="#{{ $am->href }}" class="adminScroll">{{ $am->text }}</a></li>
                    @else
                            <li id="activityLi"><a href="{{ url(''.$am->href) }}">{{ $am->text }}</a><span id="newAct"></span></li>
                    @endif
                    @endforeach
                <?php  } ?>
            </ul>
        </div>
    </div>

