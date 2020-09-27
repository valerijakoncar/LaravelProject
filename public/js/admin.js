window.onload = function(){
    $('#updateForm').hide();
    $('#insertForm').hide();
    $('#updateUserForm').hide();
    $("body").on("click", ".btnUpd", function(){
        var id = $(this).data('id');
        updateProd(id);
    });
    $("#proceedUpdU").click(updateUser);
    $("body").on("click", ".btnDel", function(){
        var id = $(this).data('id');
        deleteProd(id);
    });
    $('.updUser').click(findUser);
    $('.delUser').click(deleteUser);
    $("#updateUserForm .fa-close").click(function(){
        $('#updateUserForm').fadeOut();
    });
    $('#updateForm .fa-close').click(function(){
        $('#updateForm').fadeOut();
    });
    $('#insertDish').click(function(){
        $('#insertForm').fadeIn();
    });
    $('#insertForm .fa-close').click(function(){
        $('#insertForm').fadeOut();
    });
    $('.paginationLinksA:first').addClass('activePaginationA');
    $("body").on('click','.paginationLinksA',function(e){
        e.preventDefault();
        var limit = $(this).data('limit');
        $('.paginationLinksA').removeClass('activePaginationA');
        $(this).addClass('activePaginationA');
        paginationAdmin(limit);
    });
    $("body").on('click','.filteredPagination',function(e){
        $('.filteredPagination').removeClass('activePaginationA');
        $(this).addClass('activePaginationA');
    });
    $("#searchBtnA").keyup(function(){
        var value= $(this).val();
        if(value == ""){
            limit= 0;
            $.ajax({
                url: "admin/getProducts",
                method: "GET",
                dataType: 'json',
                success: function(data){
                    console.log(data.products);
                    printProduct(data.products);
                    getInitialPagination();
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
            $.ajax({
                url: 'admin/search',
                method: "GET",
                data: {
                    value: value
                },
                dataType: 'json',
                success: function(data){
                    console.log(data.products);
                    printProduct(data.products, 1);
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

    });

    $('#categoriesInsertA').click(showInsertBtn);
    $('#categoriesDeleteA').click(deleteCategory);
    $('#categoriesRenameA').click(showRenameBtn);
    $('#menuAdmin li:first').addClass('active');
    $(".adminScroll").on('click', function(e) {
        e.preventDefault();
        $('#menuAdmin li').removeClass('active');
        $(this).parent().addClass('active');
        var target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: ($(target).offset().top - 134)
        }, 2000);
    });
    $(".message .fa-close").click(function(){
        let messageId = $(this).parent().attr('id');
        $(this).parent().fadeOut();
        messageRead(messageId);
    });
    $("#insertSoc").click(function(e){

    });
    $(".updSoc").click(function(e){
        let id = $(this).data('id');
       $("#modifySoc").html("<input type='text' id='faClass' placeholder='Enter fa class'/><br/><input type='text' id='faHref' placeholder='Path to social network'/><br/><input type='button' id='proceedUpdSoc' value='Update'/>")
        $("#proceedUpdSoc").click(function(){
            updateSoc(id);
        });
    });

    $('.delSoc').click(function(e){
        let id =  $(this).data('id');
        deleteSoc(id);
    })
    $("#insertSoc").click(function() {
        $("#modifySoc").html("<input type='text' id='faClass' placeholder='Enter fa class'/><br/><input type='text' id='faHref' placeholder='Path to social network'/><br/><input type='button' id='proceedInsSoc' value='Insert'/>");
        $("#proceedInsSoc").click(insertSoc);
    });
    $("#activityList").change(sortActivity);
    getNewActivities();
}

//$("#TypeHere").html("<p>Type some<strong> text here.</strong></p>");

function getInitialPagination(){
    $.ajax({
        url: "admin/getPagination",
        dataType: "json",
        success: function(data){
            // console.log(data);
            var numOfPagLinks = data.pagination;
            console.log(numOfPagLinks);
            var paginationHtml= ``;
            var i;
            for(i = 0; i < numOfPagLinks; i++){
                paginationHtml += `<li>
    <a href="#" class="paginationLinksA" data-limit="${i}"> ${i+1}</a>
    </li>`;
            }
            $('#paginationA ul').html(paginationHtml);
            $('.paginationLinksA:first').addClass('activePaginationA');
        },
        error : function(err){
            console.log(err);
        }
    })
}

function deleteProd(id){
    $.ajax({
        url:"deleteProd",
        method: "GET",
        data: {
            id: id
        },
        success: function(data,xhr){
            //alert(data);
           console.log(data);
            $.ajax({
                url: "admin/getProducts",
                method: "GET",
                dataType: 'json',
                success: function(data){
                    console.log(data.products);
                    printProduct(data.products);
                    getInitialPagination();
                },
                error: function(error){
                    console.log(error);
                }
            });
        },
        error:function(xhr, textStatus, errorThrown){
            console.log(textStatus);
            console.log(errorThrown);

        }
    });
}

function paginationAdmin(offset){
    $.ajax({
        url: "admin/page/" + offset,
        method: "GET",
        dataType: 'json',
        success: function(data){
            //console.log(products);
            printProduct(data.products);
        },
        error: function(error){
            console.log(error);
        }
    });
}

function printProduct(products, shouldPrintPag= 0){
    let text = "";
    var i = 0;
    for (let p of products){
        i++;
        if(i <= 5){
            text+= `<tr class='p'>
                <td class='idProd'>${p.id}</td>
                <td><div class="picHold"><img src='${urlPics}/${p.picName}' alt='${p.alt}' class='smallPic'/>`;
            var hot = Number(p.hot);
            if(hot) {
                text += `<div class="hotAdm">Hot !</div>`;
            }
            text+=`</div></td><td>
                    <p class='prodNameA'>${p.name}</p></td><td><p class='price'>${p.price}$</p>`;
            if(p.oldPrice > 1){
                text+=`<del>${p.oldPrice}</del>`;
            }
            text+=`<td><input type='button' class='btnUpd' data-id='${p.id}' value='Update'/><br/>
                    <input type='button' class='btnDel' data-id='${p.id}' value='Delete'/>
                </td>
            </tr>`;
        }
    }
    let final = "<tr>\n" +
        "                <th>Id</th>\n" +
        "                <th>Dish</th>\n" +
        "                <th>Name</th>\n" +
        "                <th>Price</th>\n" +
        "                <th>Modify or Delete?</th>\n" +
        "            </tr>" + text;
    $('#tableProd').html(final);
    if(shouldPrintPag){
        printPagination(products);
    }
}
function printPagination(products){
    //console.log(products);
    var length = products.length;
    console.log(length);
    var i;
    var limit = 5;
    var paginationHtml ="";
    var numOfPagLinks = Math.ceil(length/limit);
    for(i = 0; i < numOfPagLinks; i++){
        paginationHtml += `<li>
    <a href="#" class="filteredPagination" data-limit="${i}"> ${i+1}</a>
    </li>`;
    }
    $('#paginationA ul').html(paginationHtml);
    $('#paginationA ul .filteredPagination:first').addClass('activePaginationA');
    $('#paginationA ul .filteredPagination').click(function(e){
        e.preventDefault();
        var offset = $(this).data('limit');
        clickedPaginationFiltered(products, offset)
    });
}

function clickedPaginationFiltered(products, offset){
    console.log("kliknuto");
    // console.log(products);
    //var offset = offset;
    console.log(offset);
    var limit = 5;
    var printStart = offset * limit + 1;
    var printEnd = printStart + (limit - 1);
    console.log(printStart);
    console.log(printEnd);
    var i = 0;
    var text = '<tr>\n' +
        '                <th>Id</th>\n' +
        '                <th>Dish</th>\n' +
        '                <th>Name</th>\n' +
        '                <th>Price</th>\n' +
        '                <th>Modify or Delete?</th>\n' +
        '            </tr>';
    for(p of products){
        i++;
        if((i == printStart) || ((i>printStart) && (i<=printEnd))){
            text+= `<tr class='p'>
                <td class='idProd'>${p.id}</td>
                <td><div class="picHold"><img src='${p.path}${p.picName}' alt='${p.alt}' class='smallPic'/>`;
            var hot = Number(p.hot);
            if(hot) {
                text += `<div class="hotAdm">Hot !</div>`;
            }
            text+=`</div></td><td>
                    <p class='prodNameA'>${p.name}</p></td><td><p class='price'>${p.price}$</p>`;
            if(p.oldPrice > 1){
                text+=`<del>${p.oldPrice}</del>`;
            }
            text+=`<td><input type='button' class='btnUpd' data-id='${p.id}' value='Update'/><br/>
                    <input type='button' class='btnDel' data-id='${p.id}' value='Delete'/>
                </td>
            </tr>`;
        }
    }
    //console.log(text);
    $('#tableProd').html(text);
}
function updateProd(id){
    //console.log(id);
    document.getElementById('idProd').value=id;
    $('#updateForm').fadeIn();
   // var _token = $("input[name='_token']").val();
    $.ajax({
        url:"getProd",
        method: "get",
        data: {
           // _token: _token,
            id:id
        },
        success: function(data,xhr){
            //console.log(data.product);
            var catId = data.product.cat_id;
            var length = document.getElementById('prodCat').options.length;
            let i = 0;
            for(i; i<length ; i++){
                var element =  document.getElementById('prodCat').options[i];
                if(element.value == catId){
                    //console.log("ima");
                    document.getElementById('prodCat').options[i].selected='selected';
                }
            }
            document.getElementById('prodName').value=data.product.name;
            document.getElementById('prodPrice').value=data.product.price;
            document.getElementById('oldPrice').value=data.product.oldPrice;
            var hot=data.product.hot;
            if(!hot){
                document.getElementById('hotProd').options[0].selected='selected';
            }else{
                document.getElementById('hotProd').options[1].selected='selected';
            }
        },
        error:function(xhr, textStatus, errorThrown){
            console.log(xhr);
            switch(xhr.status){
                case 500:
                    error="There was an error";
                case 404:
                    error="Page not found";

            }
            //alert(error);
        }
    });

}

function checkUpdate(){
    var ok=true;
    var error=[];
    //var id=document.getElementById('dishidDish').value;
    var name=document.getElementById('prodName').value;
  //  console.log(name);
    var cat = document.getElementById("prodCat").options[document.getElementById("prodCat").selectedIndex].value;
    console.log(cat);
    var price=document.getElementById('prodPrice').value;
    var oldPrice = document.getElementById('oldPrice').value;
    //var newDish=document.getElementById('newDish')[document.getElementById('newDish').selectedIndex].value;

    console.log(price);
    console.log(oldPrice);
    var reName=/./g;
    var rePrice=/^\d*\.?\d*$/;
    if(cat=='-1'){
        ok=false;
        error.push("Choose category.");
    }
    if(!reName.test(name)){
        ok=false;
        error.push("Name is not valid.");
    }
    if(price==""){
        ok=false;
        error.push("Price is not valid.");
    }
    if(!rePrice.test(price)){
        ok = false;
        error.push("Price is not valid.");
    }

    if( (oldPrice=='')){
        ok=false;
        error.push("Old price is not valid.");
    }
    if(!rePrice.test(oldPrice)){
        ok = false;
        error.push("Old price is not valid.");
    }

    console.log(ok);
    var showErr="";
    if(error.length){
        for(var er of error){
            showErr+=er+"<br/>";
        }
    }
    $('#updateForm .error').html(showErr);
    if(error.length>0){
        return false;
    }else{
        return true;
    }
}

function checkInsert(){
    var ok=true;
    var error=[];
    //var id=document.getElementById('dishidDish').value;
    //var catid=document.getElementById('categoryId').value;
    var name=document.getElementById('prodNameI').value;
    var price=document.getElementById('prodPriceI').value;
    var cat = document.getElementById("prodCatI").options[document.getElementById("prodCatI").selectedIndex].value;
    //var newDish=document.getElementById('newDish')[document.getElementById('newDish').selectedIndex].value;
    var oldPrice=document.getElementById('oldPriceI').value;
    var reName=/./g;
    var rePrice=/^\d*\.?\d*$/;
    if(cat=='-1'){
        ok=false;
        error.push("Choose category.");
    }
    if(!reName.test(name)){
        ok=false;
        error.push("Name is not valid.");
    }
    if(price==""){
        ok=false;
        error.push("Price is not valid.");
    }
    if(!rePrice.test(price)){
        ok = false;
        error.push("Price is not valid.");
    }

    if( (oldPrice=='')){
        ok=false;
        error.push("Old price is not valid.");
    }
    if(!rePrice.test(oldPrice)){
        ok = false;
        error.push("Old price is not valid.");
    }
    console.log(ok);
    var showErr="";
    for(var er of error){
        showErr+=er+"<br/>";
    }
    $('#insertForm .error').html(showErr);
    console.log(error);
    /*return ok;*/
    if(error.length>0){
        return false;
    }else{
        return true;
    }
}

function findUser(){
    var id=$(this).data('id');
    //alert(id);
    document.getElementById('idUser').value=id;
    $('#updateUserForm').fadeIn();
    //document.getElementById('userName').value='ff';
    $.ajax({
        url:"findUser/" + id,
        method: "GET",
        success: function(data,xhr){
           // console.log(data);
            document.getElementById('userName').value=data.user.username;
            //document.getElementById('passU').value=data.user.pass;
            document.getElementById('mailU').value=data.user.email;
            var sendNews = data.user.send_via_mail;
            var length = document.getElementById('sendnewsU').options.length;
            let i = 0;
            for(i; i<length ; i++){
                var element =  document.getElementById('sendnewsU').options[i];
                if(element.value == sendNews){
                    //console.log("ima");
                    document.getElementById('sendnewsU').options[i].selected='selected';
                }
            }
            //document.getElementById('sendnewsU').value=data.user.send_via_mail;
            var role = data.user.role_id;
             length = document.getElementById('roleU').options.length;
             i = 0;
            for(i; i<length ; i++){
                element =  document.getElementById('roleU').options[i];
                if(element.value == role){
                    //console.log("ima");
                    document.getElementById('roleU').options[i].selected='selected';
                }
            }
            //document.getElementById('roleU').value=data.user.role_id;
        },
        error:function(xhr, textStatus, errorThrown){
            console.log(xhr);
        }
    });
}

function updateUser(e){
    e.preventDefault();
    var id=$('#idUser').val();
    //alert(id);
    var username=$('#userName').val();
    var pass=$('#passU').val();
    var mail=$('#mailU').val();
    var sendNews=document.getElementById("sendnewsU").options[document.getElementById("sendnewsU").selectedIndex].value;
    var role=document.getElementById("roleU").options[document.getElementById("roleU").selectedIndex].value;
    var _token = $("input[name='_token']").val();
    $.ajax({
        url:"updateUser",
        method: "POST",
        data: {
            idU:id,
            username:username,
            pass: pass,
            mail: mail,
            sendNews: sendNews,
            role: role,
            _token: _token
        },
        success: function(data,xhr){
            //alert(data);
           // window.location.reload();
            document.querySelector("#updateUserForm .error").innerHTML = "";
            console.log("updateee");
            $('#updateUserForm').fadeOut();
            getUsers();
        },
        error:function(xhr, textStatus, errorThrown){
            console.log(textStatus);
            console.log(errorThrown);
            var e="An error occurred.";
            switch(xhr.status){
                case 404:
                    e = "Page not found.";
                    break;
                case 500:
                    e = "Please try again.";
                    break;
            }
            let errorsResponse = xhr.responseJSON;
            let errorsResponseText = "";
            $.each(errorsResponse.errors,function (k,v) {
                errorsResponseText += v + "<br/>";
            });
            let allErrors = errorsResponseText + "<br/>" + e;
            document.querySelector("#updateUserForm .error").innerHTML=allErrors;
        }
    });

}

function getUsers(){
    $.ajax({
        url: "getUsers",
        method: "GET",
        dataType: "json",
        success: function(data){
            printUsers(data.users);
           // console.log(data.users);
        },
        error: function(err){
            console.log(err);
        }
    })
}

function printUsers(users){
    let html = " <tr><th>Id</th><th>Username</th><th>Password</th><th>Email</th><th>Phone</th>\n" +
        "            <th>Gender</th><th>Send via mail</th><th>Role</th><th>Modify</th>\n" +
        "        </tr>";
    let i =0;
    for(let u of users){
        i++;
        html += `<tr>
        <td>${ i }</td>
        <td>${ u.username }</td>
        <td>${ u.pass }</td>
        <td>${ u.email }</td>
        <td>${ u.phone }</td>
        <td>${ u.gender }</td>
        <td>${ u.send_via_mail }</td>`;
        if(u.role_id==1){
            html += `<td>Admin</td>`;
        }else{
            html += `<td>User</td>`;
        }
           html += `<td>
            <input type='button' data-id='${ u.id }' value='Update' class='updUser'/>
            <input type='button' data-id='${ u.id }' value='Delete' class='delUser'/>
        </td></tr>`;
        $("#tableUsers").html(html);
        $('.updUser').click(findUser);
        $('.delUser').click(deleteUser);
    }
}

function deleteUser(){
    var id=$(this).data('id');
    $.ajax({
        url: "deleteUser/" + id,
        method: "GET",
        success: function(data){
           getUsers();
        },
        error: function(err){
            console.log(err);
        }
    })
}

function showInsertBtn(){
    $('#categoriesChange').html("<input type='text' placeholder='New category name..' id='newCatName'/><input type='button' id='proceedInsertCat' value='Insert'/>");
     $('#proceedInsertCat').click(function(){
         let catName = $('#newCatName').val();
         insertCategory(catName);
     });

}

function insertCategory(catName){
    let _token =  $("input[name='_token']").val();
    $.ajax({
        url: "insertCategory",
        method: "POST",
        data: {
            catName: catName,
            _token: _token
        },
        success: function(data){
            $('#categoriesChange').html('');
            $('#categoriesA .error').html('');
            $('#categoriesA .success').html("Category with id:"+ data.id + ". successfully inserted!<br/>")
            getCategories();
        },
        error: function(xhr, textStatus, errorThrown){
            $('#categoriesChange').html('');
            let errorsResponse = xhr.responseJSON;
            let errorsResponseText = "";
            $.each(errorsResponse.errors,function (k,v) {
                errorsResponseText += v + "<br/>";
            });
            document.querySelector("#categoriesA .error").innerHTML=errorsResponseText;
        }
    })
}

function getCategories(){
    $.ajax({
        url: "getCategories",
        method: "GET",
        success: function(data){
            let html = "";
            for(let c of data.cat){
                html += `<option value='${c.id}'>${c.name}</option>`;
            }
            $('#categoriesListA').html(html);
        },
        error: function(err){
            console.log(err);
        }
    })
}

function deleteCategory(){
    let id = document.getElementById("categoriesListA").options[document.getElementById("categoriesListA").selectedIndex].value;
    $.ajax({
        url: "deleteCategory/" + id,
        method: "GET",
        success: function(data){
            getCategories();
            $('#categoriesA .error').html('');
            $('#categoriesA .success').html('');
        },
        error: function(err){
            console.log(err);
        }
    })
}

function showRenameBtn(){
    $('#categoriesChange').html("<input type='text' placeholder='Rename category..' id='newCatName'/><input type='button' id='proceedRenameCat' value='Rename'/>");
    $('#proceedRenameCat').click(function(){
        let catName = $('#newCatName').val();
        renameCategory(catName);
    });

}

function renameCategory(catName){
    let _token =  $("input[name='_token']").val();
    let id = document.getElementById("categoriesListA").options[document.getElementById("categoriesListA").selectedIndex].value;
    $.ajax({
        url: "renameCategory",
        method: "POST",
        data: {
            id: id,
            catName: catName,
            _token: _token
        },
        success: function(data){
            getCategories();
            $('#categoriesChange').html('');
            $('#categoriesA .error').html('');
            $('#categoriesA .success').html("You've successfully renamed category to: " + catName + ".");
        },
        error: function(xhr, textStatus, errorThrown){
            $('#categoriesChange').html('');
            $('#categoriesA .success').html("");
            let errorsResponse = xhr.responseJSON;
            let errorsResponseText = "";
            $.each(errorsResponse.errors,function (k,v) {
                errorsResponseText += v + "<br/>";
            });
            document.querySelector("#categoriesA .error").innerHTML=errorsResponseText;
        }
    });
}

function messageRead(messageId){
    $.ajax({
        url: "messageRead/" + messageId,
        method: "GET",
        success: function(data){

        },
        error: function(xhr, textStatus, errorThrown){

        }
    });
}

function updateSoc(id){
    let href = $('#faHref').val();
    let faClass = $('#faClass').val();
    $.ajax({
        url: "updateSoc",
        method: "GET",
        data: {
            href: href,
            faClass: faClass,
            id: id
        },
        success: function(data){
            console.log(data);
            $('#modifySoc').html('');
            $('#socA .success').html('Successfully updated.');
            $('#socA .error').html('');
            getSocials();
        },
        error: function(data){
            console.log(data);
            $('#modifySoc').html('');
            $('#socA .success').html('');
            $('#socA .error').html(data.responseJSON.message);
        }
    });
}

function deleteSoc(id){
    $.ajax({
        url: "deleteSoc/" + id,
        method: "GET",
        success: function(data){
            $('#modifySoc').html('');
            $('#socA .success').html('Your delete was successful.');
            $('#socA .error').html('');
            getSocials();
        },
        error: function(data){
            console.log(data);
            $('#modifySoc').html('');
            $('#socA .success').html('');
            $('#socA .error').html(data.responseJSON.message);
        }
    });
}

function getSocials(){
    $.ajax({
        url: "getSocials",
        method: "GET",
        success: function(data){
            let html = "";
            for(let s of data.socials){
                html += ` <tr>
                    <td>
                        <a href=" ${s.href} "><span class="fa  ${s.fa }"></span></a>
                    </td>
                    <td class="socialsBtns">
                        <input type="button" value="Update" class="updSoc" data-id="${s.id}"/>
                        <input type="button" value="Delete" class="delSoc" data-id="${s.id}"/>
                    </td>
                </tr>`;
            }
            $("#socialsAdmin").html(html);
            $(".updSoc").click(function(e){
                let id = $(this).data('id');
                $("#modifySoc").html("<input type='text' id='faClass' placeholder='Enter fa class'/><br/><input type='text' id='faHref' placeholder='Path to social network'/><br/><input type='button' id='proceedUpdSoc' value='Update'/>")
                $("#proceedUpdSoc").click(function(){
                    updateSoc(id);
                });
            });

            $('.delSoc').click(function(e){
                let id =  $(this).data('id');
                deleteSoc(id);
            })
        },
        error: function(data){
            console.log(data);
        }
    });
}

function insertSoc(){
    let href = $('#faHref').val();
    let faClass = $('#faClass').val();
    $.ajax({
        url: "insertSoc",
        method: "GET",
        data: {
            href: href,
            faClass: faClass
        },
        success: function (data) {
            $('#modifySoc').html('');
            $('#socA .success').html('Your insert was successful.');
            $('#socA .error').html('');
            getSocials();
        },
        error: function (data) {
            console.log(data);
            $('#modifySoc').html('');
            $('#socA .success').html('');
            $('#socA .error').html(data.responseJSON.message);
        }
    });
}

function sortActivity(){
    let sort = document.getElementById('activityList').options[document.getElementById("activityList").selectedIndex].value;
    $.ajax({
        url: "sortActivity",
        method: "GET",
        data: {
           sort: sort
        },
        success: function (data) {
            console.log(data);
            printActivities(data.activities);
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function printActivities(activities){
    let html = "<tr><th>Activity</th><th>Date</th></tr>";
    for(let a of activities){
        html += `<tr>
                      <td>${ a.text }</td>
                       <td>${ a.date }</td>
                  </tr>`;
    }
    $("#activityTable").html(html);
}

function getNewActivities(){
    $.ajax({
        url: "newActivity",
        method: "GET",
        success: function (data) {
            console.log(data);
            $("#newAct").html(data.activities);
            if(data.activities < 1){
                $("#newAct").css("display", "none");
            }
            //printActivities(data.activities);
        },
        error: function (data) {
            console.log(data);
        }
    });
}
