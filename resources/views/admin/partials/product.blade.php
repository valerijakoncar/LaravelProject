<tr class='p'>
    <td class='idProd'>{{ $p->id }}</td>
    <td><div class="picHold"><img src='{{ asset($p->path.$p->picName) }}' alt='{{$p->alt}}' class='smallPic'/>
            @if($p->hot)
                <div class="hotAdm">Hot !</div>
            @endif
        </div></td>
    <td>
        <p class='prodNameA'>{{$p->name }}</p></td><td><p class='price'>{{$p->price}}$</p>
        @if($p->oldPrice > 1)
            <del>{{$p->oldPrice}}</del>
    @endif
    <td><input type='button' class='btnUpd' data-id='{{$p->id}}' value='Update'/><br/>
        <input type='button' class='btnDel'  data-id='{{$p->id}}' value='Delete'/>
    </td>
</tr>
