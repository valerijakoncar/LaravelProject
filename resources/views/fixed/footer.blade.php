<div id="footer">
    <div id="footerPic">
        <div id="footCont">

            @foreach($footer as $item)

            <div class="information">
                <h4>{{ $item->headline }} <span class="fa {{ $item->fa }}"></span></h4>
                <?= $item->info ?>
            </div>
        @endforeach
            <div class='information'><h4>Follow Us :)</h4>
                <ul>
                    <?php foreach($socials as $s){?>
                    <li><a href="<?php echo $s->href ?>"><span class="fa <?php echo $s->fa ?>"></span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <p id="copyright">Copyright ©&nbsp;&nbsp;Cool&nbsp;&nbsp;Stuff&nbsp;&nbsp;2020 | <a href="{{url('doc.pdf')}}">Documentation</a> | <a href="https://github.com/valerijakoncar/projects">GitHub</a></p>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    var urlPics = '{{ URL::asset('/images/edited/') }}';
</script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

</body>
</html>

