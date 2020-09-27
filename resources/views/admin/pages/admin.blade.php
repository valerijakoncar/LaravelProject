@extends("admin.admin_template")
@section("title")
    Admin
@endsection
@section("mainContent")
<div id="prodAdm">
    <div id="absProd"><div id="headlineProd"><h1>Products</h1></div>
        <input type="button" value="New +" id="insertDish" name="insertProd"/>
        <div id="searchHolderA">
            <span class="fa fa-search"></span>
            <input type="search" id="searchBtnA" name="searchBtnA" autocomplete="on" placeholder="Please search here..."/>
        </div>
        <table id="tableProd">
            <tr>
                <th>Id</th>
                <th>Dish</th>
                <th>Name</th>
                <th>Price</th>
                <th>Modify or Delete?</th>
            </tr>
            @foreach($products as $p)
                @component("admin.partials.product", ["p" => $p])
                @endcomponent
            @endforeach
        </table>
        <div id="paginationA">
            <ul>
                <?php
                for($i = 0; $i < $paginationCount; $i++):
                ?>
                    <li>
                        <a href="#" class="paginationLinksA" data-limit="<?= $i?>"><?= $i+1 ?></a>
                    </li>
                <?php endfor;  ?>
            </ul>
        </div>
    </div>
</div>
    <div id="users">
        <form  name="updateUserForm" id="updateUserForm" method="POST" action="#">
            @csrf
            <span class="fa fa-close"></span><br/><br/><br/>
            <input type="hidden" id="idUser" name="idUser"/>
            <label>Username:</label><input type="text" id="userName" name="userName"/><br/>
            <label>User's password:</label><input type="text" id="passU" name="passU"/><br/>
            <label>Users's email address:</label><input type="text" id="mailU" name="mailU"/><br/>
            <label>Send news:</label><!--<input type="text" name="sendnewsU" id="sendnewsU"/><br/>-->
            <select id="sendnewsU" name="sendnewsU">
                <option value="0">Don't send</option>
                <option value="1">Send</option>
            </select>
            <label>User's role:</label><!--<input type="text" name="roleU" id="roleU"/>-->
            <select id="roleU" name="roleU">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
            <p class="error"></p>
            <p class="success"></p>
            <p class="success"></p>
            <input type="submit" value="Update" id="proceedUpdU" name="proceedUpdU"/>
        </form>
        <h1>Users</h1>
        <table id="tableUsers">
            <tr><th>Id</th><th>Username</th><th>Password</th><th>Email</th><th>Phone</th>
                <th>Gender</th><th>Send via mail</th><th>Role</th><th>Modify</th>
            </tr>
            <?php
                $i=1;
                foreach($users as $u):
            ?>
                    @component("admin.partials.user", ["u" => $u, "i" => $i])
                    @endcomponent
            <?php
                $i++;
                 endforeach;
             ?>
        </table>
    </div>
    <div id="authCatAdmin">
        <div id="authA">
            <h1>Author</h1>
            <form method="post" action="{{ url('/authorText') }}" id="authorText" name="authorText">
                @csrf
                <textarea id="TypeHere" name="TypeHere">
                {{ $author[0]->text }}
            </textarea>
                <input type="submit" id="authSubmit" name="authSubmit" value="Update"/>
            </form>
        </div>
        <div id="categoriesA">
            <h1>Categories</h1>
            <form method="post" action="#" id="catForm" name="catForm">
                @csrf
                <input type="button" id="categoriesInsertA" name="categoriesInsertA" value="New +"><br/>
                <div id="categoriesListAHolder">
                    <select id="categoriesListA" name="categoriesListA">
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="success"></p>
                <p class="error"></p>
                <input type="button" id="categoriesRenameA" name="categoriesRenameA" value="Rename">
                <input type="button" id="categoriesDeleteA" name="categoriesDeleteA" value="Delete">
                <div id="categoriesChange">

                </div>
            </form>
        </div>
    </div>
    <div id="messMenuSocHolder">
        <div id="messages" class="messMenuSocKids">
            <h1>Messages</h1>
            @foreach($messages as $m)
                @if(!$m->readMessage)
                    <div id="{{ $m->id }}" class="message">
                        <span class="fa fa-close"></span>
                        <span class="messEmail">{{ $m->email }}</span>
                        <p class="messContent">{{ $m->message }}</p>
                    </div>
                @endif
                @endforeach
        </div>
        <div class="messMenuSocKids" id="socA">
            <h1>Socials</h1>
            <input type="button" value="Insert +" id="insertSoc"/>
            <div id="modifySoc"></div>
            <p class="success"></p>
            <p class="error"></p>
            <table id="socialsAdmin">
                <?php foreach($socials as $s){?>
                <tr>
                    <td>
                        <a href="<?php echo $s->href ?>"><span class="fa <?php echo $s->fa ?>"></span></a>
                    </td>
                    <td class="socialsBtns">
                        <input type="button" value="Update" class="updSoc" data-id="<?= $s->id?>"/>
                        <input type="button" value="Delete" class="delSoc" data-id="<?= $s->id?>"/>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    @endsection
