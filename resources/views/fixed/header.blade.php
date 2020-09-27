<body>
<div id="header">
    <div id="headerHolder">
        <div id="socialNetworks" class="widthHeaderElements">
            <ul id="socialList">
                <?php foreach($socials as $s){?>
                    <li><a href="<?php echo $s->href ?>"><span class="fa <?php echo $s->fa ?>"></span></a></li>
                <?php } ?>
            </ul>
        </div>
        <h1 id="logo" class="widthHeaderElements"><a href="index.php">Cool <span class="fa fa-star"></span> Stuff</a></h1>
        <div id="logReg" class="widthHeaderElements">
            <ul id="logRegList">
                @if(session()->has('user'))
                    <li><a href='#' id='hello'>{{ session("user")->username }}<span class='fa fa-heart-o'></span></a></li>
                    <li><a href='{{ url("/logout") }}'>Logout?</a></li>
                    @endif
                @if(!session()->has('user'))
                    <li><a href="#" id="logLink">Log In</a></li>
                    <li><a href="#" id="regLink">Sign Up</a></li>
                    @endif
                @if(session()->has('user'))
                        @if(session('user')->role_id == 2)
                            <li><a href="#" id="wishlistLink"><span class="fa fa-shopping-bag"></span> My Wishlist</a></li>
                        @endif
                    @endif
            </ul>
            <form id="registrationForm" action="#" method="POST">
                @csrf
                <table>
                    <tr><td colspan="2"><span class="fa fa-close x"></span></td></tr>
                    <tr><td colspan="2"><p id="headlineReg">Registration</p></td></tr>
                    <tr><td colspan="2"><input type="text" id="regName" name="regName" placeholder="Username *"/><p class="error" id="nameError"></p></td></tr>
                    <tr><td colspan="2"><input type="password" id="regPass" name="regPass" placeholder="Password *"/><p class="error" id="passError"></p></td></tr>
                    <tr><td colspan="2"><input type="password" id="regPass1" name="regPass1" placeholder="Type in password again *"/><p class="error" id="regPass1Error"></p></td></tr>
                    <tr><td><input type="text" id="email" name="email" placeholder="E-mail *"/><p class="error" id="mailError"></p></td>
                        <td class="marginTd"><input type="text" id="tel" name="tel" placeholder="Phone *"/><p class="error" id="telError"></p></td></tr>
                    <tr><td>Gender: *<p class="error" id="genderError"></p></td><td><input type="radio" id="female" name="gender" value="f"/>Female<input type="radio" id="male" name="gender"value="m"/>Male</td></tr>
                    <tr><td colspan="2"><input type="town" id="town" name="town" placeholder="Town"/><p class="error" id="townError"></p></td></tr>
                    <tr><td><input type="text" id="address" name="address" placeholder="Address"/><p class="error" id="addrError"></p></td>
                        <td class="marginTd"><input type="text" id="zip" name="zip" placeholder="Zip"/><p class="error" id="zipError"></p></td></tr>
                    <tr><td colspan="2"><input type="checkbox" id="chbMail" checked="checked "value="send" name="chbMail"/>Send news to email</td></tr>
                    <tr><td colspan="2"><input type="button" id="btnRegistration" value="Registrate"/></td></tr>
                    <tr><td><p class="success"></p></td></tr>
                </table>
            </form>

            <form method="POST" action="{{ url('/login') }}" id="logForm">
                @csrf
                <span class="fa fa-close x"></span>
                <input type="text" name="logUsername" id="logUsername" placeholder="Name"/><p class="error" id="logUsernameError"></p>
                <input type="password" name="logPass" id="logPass" placeholder="Password"/><p class="error" id="logPassError"></p>
                <input type="submit" name="logIn" id="logIn" value="Log in" />

                <p class="error" id="logError">
                    @isset($errors)
                        @foreach($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                    @endisset
                    @if(session()->has('message'))
                        {{ session('message') }}
                    @endif

                </p>
            </form>

            <div id="cart">

            </div>
        </div>
    </div>
    <div id="menu">
        <ul id="menuList">
            <?php $i=0; ?>
             @foreach($menu as $item)
            <?php
            if($item->text=="Home"){
            $i++;
            ?>
            <li class="<?php if(isset($active) && $item->id == $active) { echo "active"; }?>"><a href="{{ url(''.$item->href) }}" data-active="{{ $i }}">{{ $item->text }}</a></li>
              @foreach($categories as $catItem)
                <?php  $i++; ?>
                <li class="<?php if(isset($activeCategory) && $catItem->id == $activeCategory) { echo "active"; }?>"><a href="{{ url('home/category/'.$catItem->id) }}" data-id="{{ $catItem->id }}" data-active="{{ $i }}">{{ $catItem->name }}</a></li>
              @endforeach
            <?php }else{  $i++; ?>
            <li class="<?php if(isset($active) && $item->id == $active) { echo "active"; }?>"><a href="{{ url(''.$item->href) }}" data-active="{{ $i }}">{{ $item->text }}</a></li>
            <?php } ?>
             @endforeach
            @if(session()->has('user'))
                @if(session('user')->role_id == 1)
                    <li><a href='{{ url("/admin") }}'>Admin</a></li>
                    @endif
                @endif
        </ul>
    </div>
</div>
